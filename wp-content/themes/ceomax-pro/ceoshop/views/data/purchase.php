<?php




// 商品类型
$productTypeFilters = [];
foreach (CeoShopCoreProduct::PRODUCT_NAME as $tK => $tV) {
    $productTypeFilters[] = ['text' => $tV, 'value' => $tK];
}
$productTypeFilters = json_encode($productTypeFilters);
$productTypeFormatText = json_encode(CeoShopCoreProduct::PRODUCT_NAME);

// 支付方式
$payTypeFilters = [];
foreach (CeoShopCorePay::PAY_PRODUCT_TYPE as $tK => $tV) {
    $payTypeFilters[] = ['text' => $tV, 'value' => $tK];
}
$payTypeFilters = json_encode($payTypeFilters);
$payTypeFormatText = json_encode(CeoShopCorePay::PAY_PRODUCT_TYPE);

$currencyName = ceo_shop_get_balance_name();

?>
<?php ceo_shop_echo_admin_loading() ?>
<div class="wrap">
    <div id="ceo-app">
        <h1 class="wp-heading-inline">购买记录</h1>
        <hr class="wp-header-end" style="margin-bottom: 20px">
        <el-row :gutter="15" style="margin-bottom: 30px;">
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="16">
                            <div class="card-row1-title">今日销售统计</div>
                            <div class="card-row1-number">{{ dashboardData[0].num1 }}<?php echo $currencyName ?></div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-shopping-cart-full ceo-manage-icon ceo-manage-icon-blue"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="购买总订单">
                                <template slot="formatter"> {{ dashboardData[0].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="已支付订单">
                                <template slot="formatter"> {{ dashboardData[0].num3 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="未支付订单">
                                <template slot="formatter"> {{ dashboardData[0].num4 }}条 </template>
                            </el-statistic>
                        </el-col>
                    </el-row>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="16">
                            <div class="card-row1-title">本月销售统计</div>
                            <div class="card-row1-number">{{ dashboardData[1].num1 }}<?php echo $currencyName ?></div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-shopping-cart-full ceo-manage-icon ceo-manage-icon-green"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="购买总订单">
                                <template slot="formatter"> {{ dashboardData[1].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="已支付订单">
                                <template slot="formatter"> {{ dashboardData[1].num3 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="未支付订单">
                                <template slot="formatter"> {{ dashboardData[1].num4 }}条 </template>
                            </el-statistic>
                        </el-col>
                    </el-row>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="16">
                            <div class="card-row1-title">本年销售统计</div>
                            <div class="card-row1-number">{{ dashboardData[2].num1 }}<?php echo $currencyName ?></div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-shopping-cart-full ceo-manage-icon ceo-manage-icon-yellow"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="购买总订单">
                                <template slot="formatter"> {{ dashboardData[2].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="已支付订单">
                                <template slot="formatter"> {{ dashboardData[2].num3 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="未支付订单">
                                <template slot="formatter"> {{ dashboardData[2].num4 }}条 </template>
                            </el-statistic>
                        </el-col>
                    </el-row>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="16">
                            <div class="card-row1-title">全部销售统计</div>
                            <div class="card-row1-number">{{ dashboardData[3].num1 }}<?php echo $currencyName ?></div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-shopping-cart-full ceo-manage-icon ceo-manage-icon-red"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="购买总订单">
                                <template slot="formatter"> {{ dashboardData[3].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="已支付订单">
                                <template slot="formatter"> {{ dashboardData[3].num3 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="未支付订单">
                                <template slot="formatter"> {{ dashboardData[3].num4 }}条 </template>
                            </el-statistic>
                        </el-col>
                    </el-row>
                </el-card>
            </el-col>
        </el-row>
        <el-row>
            <el-col>
                <el-form :inline="true" :model="indexParams.search" size="mini">
                    <el-form-item label="用户名">
                        <el-input v-model="indexParams.search.display_name" placeholder="请输入用户名" clearable></el-input>
                    </el-form-item>
                    <el-form-item label="购买时间">
                        <el-date-picker v-model="indexParams.search.date" type="datetimerange" value-format="timestamp" :picker-options="pickerOptions" range-separator="至" start-placeholder="开始日期" end-placeholder="结束日期">
                        </el-date-picker>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="onSearch">搜索</el-button>
                        <el-button @click="onReset">重置</el-button>
                    </el-form-item>
                </el-form>
            </el-col>
        </el-row>
        <el-row>
            <el-col>
                <el-table ref="indexTable" v-loading="loading" :data="tableData" @sort-change="handleSortChange" @filter-change="filterChange" stripe style="width: 100%">
                    <template slot="empty">
                        <el-empty description="暂无数据"></el-empty>
                    </template>
                    <el-table-column type="selection" width="55"></el-table-column>
                    <el-table-column prop="id" label="ID" sortable="custom"> </el-table-column>
                    <el-table-column prop="display_name" label="用户名">
                        <template slot-scope="scope">
                            <span v-if="scope.row.user_id != 0">{{ scope.row.display_name }}</span>
                            <el-tooltip v-else effect="dark" :content="scope.row.visitor_token" placement="top-start">
                                <span>游客</span>
                            </el-tooltip>
                        </template>
                    </el-table-column>
                    <el-table-column prop="order_sn" label="订单号" width="170"></el-table-column>
                    <el-table-column prop="post_title" label="商品名称"></el-table-column>
                    <el-table-column prop="sku" label="商品套餐">
                        <template slot-scope="scope">
                            <span>套餐{{ scope.row.sku }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="money" label="商品价格"></el-table-column>
                    <el-table-column prop="actual_money" label="实付金额"></el-table-column>
                    <el-table-column prop="product_type" label="商品类型" column-key="product_type" :filters="productTypeFilters">
                        <template slot-scope="scope">
                            <span>{{ productTypeFormatText[scope.row.product_type] }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="quantity" label="购买数量"></el-table-column>
                    <el-table-column prop="coupon_discount_user_id" label="代金券">
                        <template slot-scope="scope">
                            <template v-if="scope.row.coupon_discount_user_id">
                                <el-tooltip class="item" effect="dark" placement="top" style="margin-top: 4px">
                                    <div slot="content">
                                        <span>优惠券：{{ scope.row.cd_title }}</span>
                                        <br>
                                        <span>面值：{{ scope.row.cd_money }}</span>
                                    </div>
                                    <el-badge is-dot class="item"><el-tag type="warning">已使用</el-tag></el-badge>
                                </el-tooltip>
                            </template>
                            <el-tag v-else type="success" style="margin-top: 4px">未使用</el-tag>
                        </template>
                    </el-table-column>
                    <el-table-column prop="pay_type" label="支付方式" column-key="pay_type" :filters="payTypeFilters">
                        <template slot-scope="scope">
                            <span>{{ payTypeFormatText[scope.row.pay_type] }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="status" label="支付状态" column-key="status" :filters="[{text: '已支付', value: 1}, {text: '未支付', value: 0}]" :filter-multiple="false">
                        <template slot-scope="scope">
                            <el-tag v-if="scope.row.status == 1" type="success">已支付</el-tag>
                            <el-tag v-else-if="scope.row.status == 0" type="warning">未支付</el-tag>
                        </template>
                    </el-table-column>
                    <el-table-column prop="ip" label="IP地址"></el-table-column>
                    <el-table-column width="225" prop="created_time" label="操作时间">
                        <template slot-scope="scope">
                            <div>下单时间：<span v-if="scope.row.created_time">{{ scope.row.created_time }}</span><span v-else>-</span></div>
                            <div>支付时间：<span v-if="scope.row.pay_time">{{ scope.row.pay_time }}</span><span v-else>-</span>
                            </div>
                        </template>
                    </el-table-column>
                    <el-table-column label="管理">
                        <template slot-scope="scope">
                            <el-button size="mini" @click="onDetailOpen(scope.row)">查看详情</el-button>
                            <!-- <el-button size="mini" type="danger" @click="handleDelete(scope.row.id)">删除</el-button> -->
                        </template>
                    </el-table-column>
                </el-table>
            </el-col>
        </el-row>
        <el-row>
            <el-col style="margin-top: 20px;display: flex;align-items: center;">
                <el-button style="display: inline-block;margin-right: 20px;" size="mini" type="danger" @click="handleMulDelete()">批量删除</el-button>
                <el-pagination class="pagination" background @size-change="handleSizeChange" @current-change="handleCurrentChange" :page-size="indexParams.pageSize" :current-page="indexParams.page" layout="total, sizes, prev, pager, next" :total="total">
                </el-pagination>
            </el-col>
        </el-row>

        <el-dialog title="购买详情" width="25%" :visible.sync="dialogDetailFormVisible">
            <el-descriptions :column="2">
                <el-descriptions-item label="用户名">{{ detailForm.row.display_name }}</el-descriptions-item>
                <el-descriptions-item label="订单号" class="order-item" label-class-name="order-label" content-class-name="order-content">{{ detailForm.row.order_sn }}</el-descriptions-item>
                <el-descriptions-item label="商品名称">{{ detailForm.row.post_title }}</el-descriptions-item>
                <el-descriptions-item label="商品套餐">{{ detailForm.row.sku }}</el-descriptions-item>
                <el-descriptions-item label="商品价格">{{ detailForm.row.money }}</el-descriptions-item>
                <el-descriptions-item label="实付金额">{{ detailForm.row.actual_money }}</el-descriptions-item>
                <el-descriptions-item label="商品类型">{{ productTypeFormatText[detailForm.row.product_type] }}</el-descriptions-item>
                <el-descriptions-item label="购买数量">{{ detailForm.row.quantity }}</el-descriptions-item>
                <el-descriptions-item label="支付方式">{{ payTypeFormatText[detailForm.row.pay_type] }}</el-descriptions-item>
                <el-descriptions-item label="支付状态">
                    <el-tag v-if="detailForm.row.status == 1" type="success" size="small">已支付</el-tag>
                    <el-tag v-else-if="detailForm.row.status == 0" type="warning" size="small">未支付</el-tag>
                </el-descriptions-item>
                <el-descriptions-item label="IP地址">{{ detailForm.row.ip }}</el-descriptions-item>
                <el-descriptions-item label="购买时间">{{ detailForm.row.pay_time }}</el-descriptions-item>
            </el-descriptions>

            <div v-if="detailForm.row.product_type == 2">
                <el-divider></el-divider>
                <el-descriptions :column="1" style="margin-bottom: 20px;">
                    <el-descriptions-item label="买家地址">{{ detailForm.row.buyer_adder }}</el-descriptions-item>
                    <el-descriptions-item label="买家留言">{{ detailForm.row.buyer_remark }}</el-descriptions-item>
                </el-descriptions>
                <el-form ref="detailForm" :model="detailForm" :rules="detailFormRules" label-position="left" label-width="70px" size="small">
                    <el-form-item label="快递公司">
                        <el-input v-model="detailForm.express_name"></el-input>
                    </el-form-item>
                    <el-form-item label="快递单号">
                        <el-input v-model="detailForm.express_sn"></el-input>
                    </el-form-item>
                    <el-form-item label="发货状态">
                        <el-select v-model="detailForm.shipping_status">
                            <el-option :disabled="detailForm.row.status == 1" label="等待付款" :value="0"></el-option>
                            <el-option :disabled="detailForm.row.status == 0" label="等待发货" :value="1"></el-option>
                            <el-option :disabled="detailForm.row.status == 0" label="已发货" :value="2"></el-option>
                            <el-option :disabled="detailForm.row.status == 0" label="已签收" :value="3"></el-option>
                        </el-select>
                    </el-form-item>
                </el-form>
            </div>

            <div v-if="detailForm.row.product_type == 2" slot="footer" class="dialog-footer">
                <el-button @click="dialogDetailFormVisible = false" size="medium">取 消</el-button>
                <el-button type="primary" :loading="detailFormLoading" @click="onDetailUpdate" size="medium">确 定
                </el-button>
            </div>
        </el-dialog>
    </div>
</div>

<script>
    new Vue({
        el: '#ceo-app',
        data: {
            loading: false,
            tableData: [],
            dashboardData: [{
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
            total: 0,
            indexParams: {
                page: 1,
                pageSize: 10,
                sort: {},
                filter: {},
                search: {
                    display_name: '',
                    date: '',
                },
            },
            productTypeFilters: <?php echo $productTypeFilters ?>,
            productTypeFormatText: <?php echo $productTypeFormatText ?>,
            payTypeFilters: <?php echo $payTypeFilters ?>,
            payTypeFormatText: <?php echo $payTypeFormatText ?>,
            pickerOptions: {
                shortcuts: [{
                    text: '今天',
                    onClick(picker) {
                        const today = new Date();
                        today.setHours(0, 0, 0, 0);
                        const start = today.getTime();
                        const end = start + 86400000 - 1;
                        picker.$emit('pick', [start, end]);
                    }
                }, {
                    text: '昨天',
                    onClick(picker) {
                        const yesterday = new Date();
                        yesterday.setDate(yesterday.getDate() - 1);
                        yesterday.setHours(0, 0, 0, 0);
                        const start = yesterday.getTime();
                        const end = start + 86400000 - 1;
                        picker.$emit('pick', [start, end]);
                    }
                }, {
                    text: '最近7天',
                    onClick(picker) {
                        const end = new Date();
                        const start = new Date();
                        start.setTime(start.getTime() - 3600 * 1000 * 24 * 7);
                        picker.$emit('pick', [start.getTime(), end.getTime()]);
                    }
                }, {
                    text: '最近30天',
                    onClick(picker) {
                        const end = new Date();
                        const start = new Date();
                        start.setTime(start.getTime() - 3600 * 1000 * 24 * 30);
                        picker.$emit('pick', [start.getTime(), end.getTime()]);
                    }
                }, {
                    text: '本月',
                    onClick(picker) {
                        const today = new Date();
                        const thisMonthStart = new Date(today.getFullYear(), today.getMonth(), 1);
                        thisMonthStart.setHours(0, 0, 0, 0);
                        const thisMonthEnd = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                        thisMonthEnd.setHours(23, 59, 59, 999);
                        const start = thisMonthStart.getTime();
                        const end = thisMonthEnd.getTime();
                        picker.$emit('pick', [start, end]);
                    }
                }, {
                    text: '本年',
                    onClick(picker) {
                        const today = new Date();
                        const thisYearStart = new Date(today.getFullYear(), 0, 1);
                        thisYearStart.setHours(0, 0, 0, 0);
                        const thisYearEnd = new Date(today.getFullYear() + 1, 0, 0);
                        thisYearEnd.setHours(23, 59, 59, 999);
                        const start = thisYearStart.getTime();
                        const end = thisYearEnd.getTime();
                        picker.$emit('pick', [start, end]);
                    }
                }]
            },

            // 详情
            dialogDetailFormVisible: false,
            detailFormLoading: false,
            detailForm: {
                id: 0,
                row: {},
                express_name: '',
                express_sn: '',
                shipping_status: 0,
            },
            detailFormRules: {},
        },
        beforeMount() {
            document.getElementById('initLoading').style.display = 'none'
        },
        mounted() {
            this.load()
            let _this = this
            axios.get('/wp-json/ceo-shop/v1/data-dashboard/purchase')
                .then(function(res) {
                    _this.$set(_this, 'dashboardData', res.data.data)
                })
                .catch(function(err) {
                    console.log(err)
                })
                .then(function() {});
        },
        methods: {
            load() {
                this.loading = true
                let _this = this
                axios.get('/wp-json/ceo-shop/v1/data-purchase/index', {
                        params: this.indexParams
                    })
                    .then(function(res) {
                        _this.tableData = res.data.data
                        _this.total = res.data.pagination.total
                    })
                    .catch(function(err) {
                        console.log(err);
                    })
                    .then(function() {
                        _this.loading = false
                    });
            },
            handleSizeChange(val) {
                this.indexParams.pageSize = val
                this.indexParams.page = 1
                this.load()
            },
            handleCurrentChange(val) {
                this.indexParams.page = val
                this.load()
            },
            handleSortChange(val) {
                this.indexParams.sort = {
                    key: val.prop,
                    order: val.order,
                }
                this.load()
            },
            filterChange(val) {
                for (let i in val) {
                    this.indexParams.filter[i] = val[i]
                }
                this.load()
            },
            onSearch() {
                this.load()
            },
            onReset() {
                this.indexParams = {
                    page: 1,
                    pageSize: 10,
                    sort: {},
                    filter: {},
                    search: {
                        display_name: '',
                        date: '',
                    },
                }
                this.$refs.indexTable.clearSort()
                this.$refs.indexTable.clearFilter()
                this.load()
            },

            // 详情
            onDetailOpen(row) {
                this.detailForm.id = row.id
                this.detailForm.row = row
                this.detailForm.express_name = row.express_name
                this.detailForm.express_sn = row.express_sn
                this.detailForm.shipping_status = parseInt(row.shipping_status)

                if (row.status == 0) {
                    this.detailForm.shipping_status = 0
                }
                if (row.status == 1) {
                    if (!this.detailForm.shipping_status || this.detailForm.shipping_status == 0) {
                        this.detailForm.shipping_status = 1
                    }
                }

                this.dialogDetailFormVisible = true
            },
            onDetailUpdate() {
                let validFlag = true
                this.$refs.detailForm.validate(function(valid) {
                    if (!valid) {
                        validFlag = false
                    }
                });
                if (!validFlag) {
                    return false
                }

                this.detailFormLoading = true
                let _this = this
                axios.post(
                    '/wp-json/ceo-shop/v1/data-purchase/update',
                    this.detailForm, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function(res) {
                    if (res.data.success) {
                        _this.$message({
                            message: res.data.msg,
                            type: 'success',
                            offset: 60,
                        });
                        _this.detailForm = {
                            id: 0,
                            row: {},
                            express_name: '',
                            express_sn: '',
                            // shipping_status: 0,
                        }
                        _this.dialogDetailFormVisible = false
                        _this.load()
                    } else {
                        _this.$message({
                            message: res.data.msg,
                            type: 'error',
                            offset: 60,
                        });
                    }
                }).catch(function(err) {
                    console.log(err)
                }).then(function() {
                    _this.detailFormLoading = false
                });
            },
            handleDelete(id) {
                this.loading = true
                let _this = this
                axios.post('/wp-json/ceo-shop/v1/data-purchase/delete', {
                        ids: [id]
                    }, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function(res) {
                        if (res.data.success) {
                            _this.$message({
                                message: res.data.msg,
                                type: 'success',
                                offset: 60,
                            });
                            _this.load()
                        } else {
                            _this.$message({
                                message: res.data.msg,
                                type: 'error',
                                offset: 60,
                            });
                        }
                    })
                    .catch(function(err) {
                        console.log(err);
                    })
                    .then(function() {
                        _this.loading = false
                    });
            },
            handleMulDelete() {
                let ids = []
                this.$refs.indexTable.selection.forEach(function(item) {
                    ids.push(item.id)
                })
                this.loading = true
                let _this = this
                axios.post('/wp-json/ceo-shop/v1/data-purchase/delete', {
                        ids: ids
                    }, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function(res) {
                        if (res.data.success) {
                            _this.$message({
                                message: res.data.msg,
                                type: 'success',
                                offset: 60,
                            });
                            _this.load()
                        } else {
                            _this.$message({
                                message: res.data.msg,
                                type: 'error',
                                offset: 60,
                            });
                        }
                    })
                    .catch(function(err) {
                        console.log(err);
                    })
                    .then(function() {
                        _this.loading = false
                    });
            }
        }
    })
</script>

<style scoped>
    .order-label {
        min-width: 50px;
    }

    .order-content {
        min-width: 200px;
        margin-left: -10px;
    }

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
</style>
