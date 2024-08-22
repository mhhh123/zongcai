<?php

$currencyName = ceo_shop_get_balance_name();

?>


<?php ceo_shop_echo_admin_loading() ?>

<div class="wrap">
    <div id="ceo-app">
        <el-row :gutter="gutter">
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="12">
                            <div class="card-row1-title">今日充值统计</div>
                            <div class="card-row1-number">{{ loadData.row1[0].num4 }}<?php echo $currencyName ?></div>
                        </el-col>
                        <el-col :span="12">
                            <apex-chart v-if="loadAfter" :options="row1.chart1"></apex-chart>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="总订单充值">
                                <template slot="formatter"> {{ loadData.row1[0].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="已支付订单">
                                <template slot="formatter"> {{ loadData.row1[0].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="未支付订单">
                                <template slot="formatter"> {{ loadData.row1[0].num3 }}条 </template>
                            </el-statistic>
                        </el-col>
                    </el-row>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="12">
                            <div class="card-row1-title">今日会员统计</div>
                            <div class="card-row1-number">{{ loadData.row1[1].num4 }}位</div>
                        </el-col>
                        <el-col :span="12">
                            <apex-chart v-if="loadAfter" :options="row1.chart2"></apex-chart>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="开通总订单">
                                <template slot="formatter"> {{ loadData.row1[1].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="已支付订单">
                                <template slot="formatter"> {{ loadData.row1[1].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="未支付订单">
                                <template slot="formatter"> {{ loadData.row1[1].num3 }}条 </template>
                            </el-statistic>
                        </el-col>
                    </el-row>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="12">
                            <div class="card-row1-title">今日下载统计</div>
                            <div class="card-row1-number">{{ loadData.row1[2].num4 }}次</div>
                        </el-col>
                        <el-col :span="12">
                            <apex-chart v-if="loadAfter" :options="row1.chart3"></apex-chart>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="免费产品下载">
                                <template slot="formatter"> {{ loadData.row1[2].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="VIP产品下载">
                                <template slot="formatter"> {{ loadData.row1[2].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="产品下载数">
                                <template slot="formatter"> {{ loadData.row1[2].num3 }}条 </template>
                            </el-statistic>
                        </el-col>
                    </el-row>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="12">
                            <div class="card-row1-title">今日提现统计</div>
                            <div class="card-row1-number">{{ loadData.row1[3].num4 }}元</div>
                        </el-col>
                        <el-col :span="12">
                            <apex-chart v-if="loadAfter" :options="row1.chart4"></apex-chart>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="提现订单">
                                <template slot="formatter"> {{ loadData.row1[3].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="现金提现">
                                <template slot="formatter"> {{ loadData.row1[3].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="货币提现">
                                <template slot="formatter"> {{ loadData.row1[3].num3 }}条 </template>
                            </el-statistic>
                        </el-col>
                    </el-row>
                </el-card>
            </el-col>
        </el-row>
        <el-row :gutter="gutter" :style="{'margin-top': gutter + 'px'}">
            <el-col :span="12">
                <el-card>
                    <div class="card-row2-title">
                        <span>购买订单统计</span>
                        <a class="more" href="<?php echo admin_url('admin.php?page=ceo-shop-data-menu-purchase') ?>">更多<i class="el-icon-arrow-right"></i></a>
                    </div>
                    <div class="card-row2-content">
                        <el-row>
                            <el-col :span="6">
                                <div class="s-number">{{ loadData.row2[0].num1 }}<?php echo $currencyName ?></div>
                                <div class="s-title">今日销售</div>
                            </el-col>
                            <el-col :span="6">
                                <div class="s-number">{{ loadData.row2[0].num2 }}条</div>
                                <div class="s-title">今日购买总订单</div>
                            </el-col>
                            <el-col :span="6">
                                <div class="s-number">{{ loadData.row2[0].num3 }}条</div>
                                <div class="s-title">今日已支付订单</div>
                            </el-col>
                            <el-col :span="6">
                                <div class="s-number">{{ loadData.row2[0].num4 }}条</div>
                                <div class="s-title">今日未支付订单</div>
                            </el-col>
                        </el-row>
                    </div>
                    <apex-chart v-if="loadAfter" :options="row2.chart1"></apex-chart>
                </el-card>
            </el-col>
            <el-col :span="12">
                <el-card>
                    <div class="card-row2-title">
                        <span>用户统计</span>
                        <a class="more" href="<?php echo admin_url('users.php') ?>">更多<i class="el-icon-arrow-right"></i></a>
                    </div>
                    <div class="card-row2-content">
                        <el-row>
                            <el-col :span="6">
                                <div class="s-number">{{ loadData.row2[1].num1 }}位</div>
                                <div class="s-title">今日注册用户</div>
                            </el-col>
                            <el-col :span="6">
                                <div class="s-number">{{ loadData.row2[1].num2 }}位</div>
                                <div class="s-title">今日受邀注册用户</div>
                            </el-col>
                            <el-col :span="6">
                                <div class="s-number">{{ loadData.row2[1].num3 }}位</div>
                                <div class="s-title">今日登录用户</div>
                            </el-col>
                            <el-col :span="6">
                                <div class="s-number">{{ loadData.row2[1].num4 }}位</div>
                                <div class="s-title">今日封号用户</div>
                            </el-col>
                        </el-row>
                    </div>
                    <apex-chart v-if="loadAfter" :options="row2.chart2"></apex-chart>
                </el-card>
            </el-col>
        </el-row>
        <el-row :gutter="gutter" :style="{'margin-top': gutter + 'px'}">
            <el-col :span="6">
                <el-card class="card-row3-wrap">
                    <div class="card-row3-title">
                        <span>用户余额排行</span>
                    </div>
                    <div v-if="loadAfter" class="card-row3-col1-content">
                        <el-row v-for="(user, index) in loadData.row3[0]" :key="user.ID">
                            <el-col :span="12">
                                <div class="user-wrap">
                                    <el-avatar>{{ index + 1 }}</el-avatar>
                                    <span class="username">{{ user.display_name }}</span>
                                </div>
                            </el-col>
                            <el-col :span="12" class="money-wrap">
                                <el-tag type="success">{{ user.balance }} <?php echo $currencyName ?></el-tag>
                            </el-col>
                        </el-row>
                    </div>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card class="card-row3-wrap">
                    <div class="card-row3-title">
                        <span>站内文章统计</span>
                    </div>
                    <div v-if="loadAfter" class="card-row3-content">
                        <apex-chart :options="row3.chart1"></apex-chart>
                        <el-row>
                            <el-col :span="12">
                                <i class="label-icon" style="background-color: #26a0fc;"></i>
                                <span>今日发布文章</span>
                            </el-col>
                            <el-col :span="12" class="number-wrap">
                                <span>{{ loadData.row3[1].num1 }}篇</span>
                            </el-col>
                        </el-row>
                        <el-divider></el-divider>
                        <el-row>
                            <el-col :span="12">
                                <i class="label-icon" style="background-color: #26e7a6;"></i>
                                <span>本月发布文章</span>
                            </el-col>
                            <el-col :span="12" class="number-wrap">
                                <span>{{ loadData.row3[1].num2 }}篇</span>
                            </el-col>
                        </el-row>
                        <el-divider></el-divider>
                        <el-row>
                            <el-col :span="12">
                                <i class="label-icon" style="background-color: #febc3b;"></i>
                                <span>今年发布文章</span>
                            </el-col>
                            <el-col :span="12" class="number-wrap">
                                <span>{{ loadData.row3[1].num3 }}篇</span>
                            </el-col>
                        </el-row>
                        <el-divider></el-divider>
                        <el-row>
                            <el-col :span="12">
                                <i class="label-icon" style="background-color: #ff6178;"></i>
                                <span>全站发布文章</span>
                            </el-col>
                            <el-col :span="12" class="number-wrap">
                                <span>{{ loadData.row3[1].num4 }}篇</span>
                            </el-col>
                        </el-row>
                    </div>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card class="card-row3-wrap">
                    <div class="card-row3-title">
                        <span>站内商品统计</span>
                    </div>
                    <div v-if="loadAfter" class="card-row3-content">
                        <apex-chart :options="row3.chart2"></apex-chart>
                        <el-row>
                            <el-col :span="12">
                                <i class="label-icon" style="background-color: #26a0fc;"></i>
                                <span>今日发布商品</span>
                            </el-col>
                            <el-col :span="12" class="number-wrap">
                                <span>{{ loadData.row3[2].num1 }}个</span>
                            </el-col>
                        </el-row>
                        <el-divider></el-divider>
                        <el-row>
                            <el-col :span="12">
                                <i class="label-icon" style="background-color: #26e7a6;"></i>
                                <span>本月发布商品</span>
                            </el-col>
                            <el-col :span="12" class="number-wrap">
                                <span>{{ loadData.row3[2].num2 }}个</span>
                            </el-col>
                        </el-row>
                        <el-divider></el-divider>
                        <el-row>
                            <el-col :span="12">
                                <i class="label-icon" style="background-color: #febc3b;"></i>
                                <span>今年发布商品</span>
                            </el-col>
                            <el-col :span="12" class="number-wrap">
                                <span>{{ loadData.row3[2].num3 }}个</span>
                            </el-col>
                        </el-row>
                        <el-divider></el-divider>
                        <el-row>
                            <el-col :span="12">
                                <i class="label-icon" style="background-color: #ff6178;"></i>
                                <span>全站发布商品</span>
                            </el-col>
                            <el-col :span="12" class="number-wrap">
                                <span>{{ loadData.row3[2].num4 }}个</span>
                            </el-col>
                        </el-row>
                    </div>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card class="card-row3-wrap">
                    <div class="card-row3-title">
                        <span>商品类型统计</span>
                    </div>
                    <div v-if="loadAfter" class="card-row3-content">
                        <apex-chart :options="row3.chart3"></apex-chart>
                        <el-row>
                            <el-col :span="12">
                                <i class="label-icon" style="background-color: #26a0fc;"></i>
                                <span>虚拟资源</span>
                            </el-col>
                            <el-col :span="12" class="number-wrap">
                                <span>{{ loadData.row3[3].num1 }}个</span>
                            </el-col>
                        </el-row>
                        <el-divider></el-divider>
                        <el-row>
                            <el-col :span="12">
                                <i class="label-icon" style="background-color: #26e7a6;"></i>
                                <span>实物商品</span>
                            </el-col>
                            <el-col :span="12" class="number-wrap">
                                <span>{{ loadData.row3[3].num2 }}个</span>
                            </el-col>
                        </el-row>
                        <el-divider></el-divider>
                        <el-row>
                            <el-col :span="12">
                                <i class="label-icon" style="background-color: #febc3b;"></i>
                                <span>视频课程</span>
                            </el-col>
                            <el-col :span="12" class="number-wrap">
                                <span>{{ loadData.row3[3].num3 }}个</span>
                            </el-col>
                        </el-row>
                        <el-divider></el-divider>
                        <el-row>
                            <el-col :span="12">
                                <i class="label-icon" style="background-color: #ff6178;"></i>
                                <span>卡密发放</span>
                            </el-col>
                            <el-col :span="12" class="number-wrap">
                                <span>{{ loadData.row3[3].num4 }}个</span>
                            </el-col>
                        </el-row>
                    </div>
                </el-card>
            </el-col>
        </el-row>
    </div>
</div>

<script>
    Vue.component('apex-chart', {
        props: ['options'],
        mounted() {
            this.initChart();
        },
        methods: {
            initChart() {
                const chart = new ApexCharts(this.$el, this.options);
                chart.render();
            }
        },
        template: `<div></div>`
    });

    var zhCN = {
        "name": "zh-cn",
        "options": {
            "months": [
                "一月",
                "二月",
                "三月",
                "四月",
                "五月",
                "六月",
                "七月",
                "八月",
                "九月",
                "十月",
                "十一月",
                "十二月"
            ],
            "shortMonths": [
                "一月",
                "二月",
                "三月",
                "四月",
                "五月",
                "六月",
                "七月",
                "八月",
                "九月",
                "十月",
                "十一月",
                "十二月"
            ],
            "days": [
                "星期天",
                "星期一",
                "星期二",
                "星期三",
                "星期四",
                "星期五",
                "星期六"
            ],
            "shortDays": [
                "周日",
                "周一",
                "周二",
                "周三",
                "周四",
                "周五",
                "周六"
            ],
            "toolbar": {
                "exportToSVG": "下载 SVG",
                "exportToPNG": "下载 PNG",
                "exportToCSV": "下载 CSV",
                "menu": "菜单",
                "selection": "选择",
                "selectionZoom": "选择缩放",
                "zoomIn": "放大",
                "zoomOut": "缩小",
                "pan": "平移",
                "reset": "重置缩放"
            }
        }
    }


    new Vue({
        el: '#ceo-app',
        data: {
            zhCN: zhCN,
            gutter: 15,
            loading: false,
            loadAfter: false,
            loadData: {
                row1: [{
                    num1: '0',
                    num2: '0',
                    num3: '0',
                    num4: '0',
                }, {
                    num1: '0',
                    num2: '0',
                    num3: '0',
                    num4: '0',
                }, {
                    num1: '0',
                    num2: '0',
                    num3: '0',
                    num4: '0',
                }, {
                    num1: '0',
                    num2: '0',
                    num3: '0',
                    num4: '0',
                }],
                row2: [{
                    num1: '0',
                    num2: '0',
                    num3: '0',
                    num4: '0',
                }, {
                    num1: '0',
                    num2: '0',
                    num3: '0',
                    num4: '0',
                }],
                row3: [{},
                    {
                        num1: '0',
                        num2: '0',
                        num3: '0',
                        num4: '0',
                    }, {
                        num1: '0',
                        num2: '0',
                        num3: '0',
                        num4: '0',
                    },
                    {
                        num1: '0',
                        num2: '0',
                        num3: '0',
                        num4: '0',
                    }
                ],
            },
            row1: {
                chart1: {
                    chart: {
                        type: 'line',
                        height: 80,
                        sparkline: {
                            enabled: true
                        },
                        locales: [zhCN],
                        defaultLocale: 'zh-cn',
                    },
                    series: [{
                        name: '充值统计',
                        data: []
                    }],
                    xaxis: {
                        categories: []
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value.toFixed(2);
                            }
                        },
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    colors: ['#26a0fc']
                },
                chart2: {
                    chart: {
                        type: 'line',
                        height: 80,
                        sparkline: {
                            enabled: true
                        },
                        locales: [zhCN],
                        defaultLocale: 'zh-cn',
                    },
                    series: [{
                        name: '会员统计',
                        data: []
                    }],
                    xaxis: {
                        categories: []
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value.toFixed(0);
                            }
                        },
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    colors: ['#26e7a6']
                },
                chart3: {
                    chart: {
                        type: 'line',
                        height: 80,
                        sparkline: {
                            enabled: true
                        },
                        locales: [zhCN],
                        defaultLocale: 'zh-cn',
                    },
                    series: [{
                        name: '下载统计',
                        data: []
                    }],
                    xaxis: {
                        categories: []
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value.toFixed(0);
                            }
                        },
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    colors: ['#febc3b']
                },
                chart4: {
                    chart: {
                        type: 'line',
                        height: 80,
                        sparkline: {
                            enabled: true
                        },
                        locales: [zhCN],
                        defaultLocale: 'zh-cn',
                    },
                    series: [{
                        name: '提现统计',
                        data: []
                    }],
                    xaxis: {
                        categories: []
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value.toFixed(2);
                            }
                        },
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    colors: ['#ff6178']
                },
            },
            row2: {
                chart1: {
                    series: [{
                        name: '总订单金额',
                        data: [],
                    }, {
                        name: '已付款金额',
                        data: [],
                    }, {
                        name: '总订单数量',
                        data: [],
                    }, {
                        name: '已付款订单数量',
                        data: [],
                    }],
                    chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                            show: false
                        },
                        locales: [zhCN],
                        defaultLocale: 'zh-cn',
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: [],
                        labels: {
                            datetimeFormatter: {
                                day: 'MM-dd',
                            }
                        },
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value.toFixed(0);
                            }
                        },
                    },
                    tooltip: {
                        x: {
                            format: 'yyyy-MM-dd'
                        },
                    },
                },
                chart2: {
                    series: [{
                            name: '注册用户',
                            type: 'column',
                            data: [],
                        }, {
                            name: '受邀注册用户',
                            type: 'area',
                            data: [],
                        }, {
                            name: '登录用户',
                            type: 'area',
                            data: [],
                        },
                        {
                            name: '封号用户',
                            type: 'area',
                            data: [],
                        }
                    ],
                    chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                            show: false
                        },
                        stacked: false,
                        locales: [zhCN],
                        defaultLocale: 'zh-cn',
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: [],
                        labels: {
                            datetimeFormatter: {
                                day: 'MM-dd',
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value.toFixed(0);
                            }
                        },
                    },
                    tooltip: {
                        x: {
                            format: 'yyyy-MM-dd'
                        },
                    },
                },
            },
            row3: {
                chart1: {
                    series: [{
                        name: '发布文章',
                        data: [],
                    }],
                    chart: {
                        type: 'bar',
                        height: 300,
                        toolbar: {
                            show: false
                        },
                        locales: [zhCN],
                        defaultLocale: 'zh-cn',
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: [],
                        labels: {
                            datetimeFormatter: {
                                day: 'MM-dd',
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value.toFixed(0);
                            }
                        },
                    },
                    tooltip: {
                        x: {
                            format: 'yyyy-MM-dd'
                        },
                    },
                    legend: {
                        show: false,
                    }
                },
                chart2: {
                    series: [{
                        name: '发布商品',
                        data: []
                    }],
                    chart: {
                        type: 'bar',
                        height: 300,
                        toolbar: {
                            show: false
                        },
                        locales: [zhCN],
                        defaultLocale: 'zh-cn',
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: [],
                        labels: {
                            datetimeFormatter: {
                                day: 'MM-dd',
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value.toFixed(0);
                            }
                        },
                    },
                    tooltip: {
                        x: {
                            format: 'yyyy-MM-dd'
                        },
                    },
                    legend: {
                        show: false,
                    }
                },
                chart3: {
                    series: [128, 5, 26, 13],
                    chart: {
                        type: 'donut',
                        height: 335,
                        locales: [zhCN],
                        defaultLocale: 'zh-cn',
                    },
                    labels: ['虚拟资源', '实物商品', '视频课程', '卡密发放'],
                    legend: {
                        show: false,
                    }
                },
            }
        },
        beforeMount() {
            document.getElementById('initLoading').style.display = 'none'
        },
        mounted() {
            this.load()
        },
        methods: {
            load() {
                this.loading = true
                let _this = this
                axios.get('/wp-json/ceo-shop/v1/data-dashboard/index')
                    .then(function(res) {
                        _this.loadData = res.data.data
                        // row1
                        _this.row1.chart1.xaxis.categories = res.data.data.row1[0].chart1
                        _this.row1.chart1.series[0].data = res.data.data.row1[0].chart2
                        _this.row1.chart2.xaxis.categories = res.data.data.row1[1].chart1
                        _this.row1.chart2.series[0].data = res.data.data.row1[1].chart2
                        _this.row1.chart3.xaxis.categories = res.data.data.row1[2].chart1
                        _this.row1.chart3.series[0].data = res.data.data.row1[2].chart2
                        _this.row1.chart4.xaxis.categories = res.data.data.row1[3].chart1
                        _this.row1.chart4.series[0].data = res.data.data.row1[3].chart2

                        // row2
                        _this.row2.chart1.xaxis.categories = res.data.data.row2[0].chart1
                        _this.row2.chart1.series[0].data = res.data.data.row2[0].chart2
                        _this.row2.chart1.series[1].data = res.data.data.row2[0].chart3
                        _this.row2.chart1.series[2].data = res.data.data.row2[0].chart4
                        _this.row2.chart1.series[3].data = res.data.data.row2[0].chart5
                        _this.row2.chart2.xaxis.categories = res.data.data.row2[1].chart1
                        _this.row2.chart2.series[0].data = res.data.data.row2[1].chart2
                        _this.row2.chart2.series[1].data = res.data.data.row2[1].chart3
                        _this.row2.chart2.series[2].data = res.data.data.row2[1].chart4
                        _this.row2.chart2.series[3].data = res.data.data.row2[1].chart5

                        // row3
                        _this.row3.chart1.xaxis.categories = res.data.data.row3[1].chart1
                        _this.row3.chart1.series[0].data = res.data.data.row3[1].chart2
                        _this.row3.chart2.xaxis.categories = res.data.data.row3[2].chart1
                        _this.row3.chart2.series[0].data = res.data.data.row3[2].chart2
                        _this.row3.chart3.labels = res.data.data.row3[3].chart1
                        _this.row3.chart3.series = res.data.data.row3[3].chart2
                    })
                    .catch(function(err) {
                        console.log(err)
                    })
                    .then(function() {
                        _this.loadAfter = true
                        _this.loading = false
                    });
            },
        }
    })
</script>

<style scoped>
    .card-row1-title {
        font-size: 16px;
        margin: 10px 0;
        text-align: left;
    }

    .card-row1-number {
        margin-top: 30px;
        font-size: 20px;
        font-weight: 600;
        text-align: left;
    }

    .card-row2-title {
        margin-bottom: 40px;
    }

    .card-row2-title span {
        font-size: 16px;
    }

    .card-row2-title a {
        font-size: 14px;
        text-decoration: none;
        float: right;
        color: #999;
    }

    .card-row2-content {
        text-align: center;
    }

    .s-number {
        font-size: 18px;
        font-weight: 600;
    }

    .s-title {
        font-size: 14px;
        margin-top: 15px;
    }

    .label-icon {
        display: inline-block;
        width: 10px;
        height: 10px;
    }

    /* row3 */
    .card-row3-wrap {
        height: 600px;
    }

    .card-row3-title {
        margin-bottom: 40px;
    }

    .card-row3-title span {
        font-size: 16px;
    }

    .card-row3-col1-content .el-row {
        margin-bottom: 10px;
        height: 40px;
        line-height: 40px;
    }

    .card-row3-col1-content .user-wrap {
        display: flex;
    }

    .card-row3-col1-content .username {
        margin-left: 20px;
    }

    .card-row3-col1-content .money-wrap {
        text-align: right;
    }

    .card-row3-content .el-row {
        margin-bottom: 5px;
        height: 40px;
        line-height: 40px;
        font-size: 14px;
    }

    .card-row3-content .el-divider {
        margin: 0;
    }

    .card-row3-content .number-wrap {
        text-align: right;
    }
</style>
