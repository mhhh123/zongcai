<?php

/**
 * ------------------------------------------------------------------------------
 * 商城支付接口-易支付-微信
 * ------------------------------------------------------------------------------
 */
class CeoShopPaymentEpayWeixin implements CeoShopPaymentInterface
{
    // 支付渠道类型标识，不可修改
    const TYPE = 15;

    // 支付订单类型，不可修改
    private $orderType;

    // 构造函数，不可修改
    public function __construct($orderType)
    {
        $this->orderType = $orderType;
    }
    
    // 支付参数请求，不可修改
    public function send($orderData)
    {
        $order = [
            'out_trade_no' => $orderData['order_sn'],
            'total_fee' => floatval($orderData['actual_money']),
            'body' => CeoShopCorePay::getOrderTitle($this->orderType, $orderData['product_id'] ?? 0),
        ];
        
        $userConfig = _ceo('epay_weixin');
        $mchid = $userConfig['mchid'];
        $mchsecret = $userConfig['mchsecret'];
        $url = $userConfig['url_do'];
        
        if (substr($url, -strlen('submit.php')) == 'submit.php') {
            return $this->submit($order, $mchid, $mchsecret, $url);
        } else {
            return $this->scan($order, $mchid, $mchsecret, $url);
        }
    }

    // 支付回调验证，定制版易支付可按需修改
    public function verify()
    {
        // {
        //     "pid":"1001",
        //     "trade_no":"2023110917170999947",
        //     "out_trade_no":"2023110917170939713",
        //     "type":"alipay",
        //     "name":"product",
        //     "money":"0.01",
        //     "trade_status":"TRADE_SUCCESS",
        //     "sign":"75a56d911c44f5bb30335f95f459b46f",
        //     "sign_type":"MD5"
        // }
        $res = $_GET;

        $userConfig = _ceo('epay_weixin');
        $mchsecret = $userConfig['mchsecret'];

        $sign = $this->getSign($_GET, $mchsecret);

        if ($sign !== $_GET['sign']) {
            throw new \Exception('epay_weixin支付失败：Invalid sign!');
        }

        if ($res['trade_status'] == 'TRADE_SUCCESS') {
            if ($this->orderType == CeoShopCorePay::ORDER_TYPE_RECHARGE) {
                $total = $res['money'];
            } else {
                $proportion = floatval(_ceo('ceo_shop_currency_proportion', 1));
                $total = bcmul($res['money'], $proportion, 2);
            }
            return [
                'out_trade_no' => $res['out_trade_no'],
                'total_fee' => $total,
            ];
        } else {
            throw new \Exception('epay_weixin支付失败：' . json_encode($res));
        }
    }

    // 回调接收成功后输出内容，定制版易支付可按需修改
    public function success()
    {
        echo 'success';
    }

    // 发起支付请求，定制版易支付可按需修改
    private function submit($order, $mchid, $mchsecret, $url)
    {
        $data = [
            'pid' => $mchid, // 商户ID
            'type' => 'wxpay', // 支付方式
            'out_trade_no' => $order['out_trade_no'], // 商户订单号
            'notify_url' => home_url('ceo-shop-pay-notify/' . $this->orderType . '/epay_weixin/'), // 异步通知地址
            'return_url' => home_url('wp-content/themes/ceomax-pro/ceoshop/inc/success.html'),
            'name' => $order['body'], // 商品名称
            'money' => $order['total_fee'], // 商品金额
        ];

        $param = $this->buildRequestParam($data, $mchsecret);

        return [
            'code' => 1,
            'trade_no' => $order['out_trade_no'],
            'payurl' => $url . '?' . http_build_query($param),
        ];
    }

    // 发起支付请求，定制版易支付可按需修改
    private function scan($order, $mchid, $mchsecret, $url)
    {
        $data = [
            'pid' => $mchid, // 商户ID
            'type' => 'wxpay', // 支付方式
            'out_trade_no' => $order['out_trade_no'], // 商户订单号
            'notify_url' => home_url('ceo-shop-pay-notify/' . $this->orderType . '/epay_weixin/'), // 异步通知地址
            'return_url' => home_url('wp-content/themes/ceomax-pro/ceoshop/inc/success.html'),
            'name' => $order['body'], // 商品名称
            'money' => $order['total_fee'], // 商品金额	
            'clientip' => $_SERVER['REMOTE_ADDR'], // 用户IP地址
        ];

        $param = $this->buildRequestParam($data, $mchsecret);

        try {
            $response = $this->getHttpResponse($url, http_build_query($param));
            $result = $response ? json_decode($response, true) : null;

            if (!$result) {
                throw new \Exception('Internal server error');
            }

            if ($result['code'] != 1) {
                throw new \Exception($result['msg'] ?? '支付渠道方错误');
            }
            
            return $result;
        } catch (\Exception $e) {
            throw new \Exception("errcode:{$e->getCode()},errmsg:{$e->getMessage()}");
        }
    }

    // --------------------------易支付lib--------------------------
    // 构造参数
    private function buildRequestParam($param, $mchsecret)
    {
        $mysign = $this->getSign($param, $mchsecret);
        $param['sign'] = $mysign;
        $param['sign_type'] = 'MD5';
        return $param;
    }

    // 计算签名
    private function getSign($param, $mchsecret)
    {
        ksort($param);
        reset($param);
        $signstr = '';

        foreach ($param as $k => $v) {
            if ($k != "sign" && $k != "sign_type" && $v != '') {
                $signstr .= $k . '=' . $v . '&';
            }
        }
        $signstr = substr($signstr, 0, -1);
        $signstr .= $mchsecret;
        $sign = md5($signstr);
        return $sign;
    }

    // 请求外部资源
    private function getHttpResponse($url, $post = false, $timeout = 10)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $httpheader[] = "Accept: */*";
        $httpheader[] = "Accept-Language: zh-CN,zh;q=0.8";
        $httpheader[] = "Connection: close";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($post) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}