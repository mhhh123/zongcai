<?php



// 充值方式
$payTypeFilters = [];
foreach (CeoShopCorePay::PAY_TYPE as $tK => $tV) {
    $payTypeFilters[] = ['text' => $tV, 'value' => $tK];
}
$payTypeFilters = json_encode($payTypeFilters);
$payTypeFormatText = json_encode(CeoShopCorePay::PAY_TYPE);

$currencyName = ceo_shop_get_balance_name();

?>
<?php ceo_shop_echo_admin_loading() ?>
<div class="wrap">
    <div id="ceo-app">
        <h1 class="wp-heading-inline">充值记录</h1>
        <hr class="wp-header-end" style="margin-bottom: 20px">
        <el-row :gutter="15" style="margin-bottom: 30px;">
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="16">
                            <div class="card-row1-title">今日充值统计</div>
                            <div class="card-row1-number">{{ dashboardData[0].num4 }}<?php echo $currencyName ?></div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-wallet ceo-manage-icon ceo-manage-icon-blue"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="总订单充值">
                                <template slot="formatter"> {{ dashboardData[0].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="已支付订单">
                                <template slot="formatter"> {{ dashboardData[0].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="未支付订单">
                                <template slot="formatter"> {{ dashboardData[0].num3 }}条 </template>
                            </el-statistic>
                        </el-col>
                    </el-row>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="16">
                            <div class="card-row1-title">本月充值统计</div>
                            <div class="card-row1-number">{{ dashboardData[1].num4 }}<?php echo $currencyName ?></div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-wallet ceo-manage-icon ceo-manage-icon-green"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="总订单充值">
                                <template slot="formatter"> {{ dashboardData[1].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="已支付订单">
                                <template slot="formatter"> {{ dashboardData[1].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="未支付订单">
                                <template slot="formatter"> {{ dashboardData[1].num3 }}条 </template>
                            </el-statistic>
                        </el-col>
                    </el-row>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="16">
                            <div class="card-row1-title">本年充值统计</div>
                            <div class="card-row1-number">{{ dashboardData[2].num4 }}<?php echo $currencyName ?></div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-wallet ceo-manage-icon ceo-manage-icon-yellow"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="总订单充值">
                                <template slot="formatter"> {{ dashboardData[2].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="已支付订单">
                                <template slot="formatter"> {{ dashboardData[2].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="未支付订单">
                                <template slot="formatter"> {{ dashboardData[2].num3 }}条 </template>
                            </el-statistic>
                        </el-col>
                    </el-row>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="16">
                            <div class="card-row1-title">全部充值统计</div>
                            <div class="card-row1-number">{{ dashboardData[3].num4 }}<?php echo $currencyName ?></div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-wallet ceo-manage-icon ceo-manage-icon-red"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="总订单充值">
                                <template slot="formatter"> {{ dashboardData[3].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="已支付订单">
                                <template slot="formatter"> {{ dashboardData[3].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="未支付订单">
                                <template slot="formatter"> {{ dashboardData[3].num3 }}条 </template>
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
                    <el-form-item label="订单号">
                        <el-input v-model="indexParams.search.order_sn" placeholder="请输入订单号" clearable></el-input>
                    </el-form-item>
                    <el-form-item label="充值时间">
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
                    <el-table-column prop="id" label="ID" sortable="custom"></el-table-column>
                    <el-table-column prop="display_name" label="用户名"></el-table-column>
                    <el-table-column prop="order_sn" label="订单号"></el-table-column>
                    <el-table-column prop="money" label="充值金额" sortable="custom">
                        <template slot-scope="scope">
                            <span>￥{{ scope.row.money }}</span>&nbsp;|&nbsp;<span>{{ scope.row.balance }}<?php echo $currencyName ?></span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="after" label="余额">
                        <template slot-scope="scope">
                            <span v-if="scope.row.status == 1">{{ scope.row.after }}</span>
                            <span v-else>-</span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="pay_type" label="充值方式" column-key="pay_type" :filters="payTypeFilters">
                        <template slot-scope="scope">
                            <span>{{ payTypeFormatText[scope.row.pay_type] }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="status" label="充值状态" column-key="status" :filters="[{text: '已支付', value: 1}, {text: '未支付', value: 0}]" :filter-multiple="false">
                        <template slot-scope="scope">
                            <el-tag v-if="scope.row.status == 1" type="success">已支付</el-tag>
                            <el-tag v-else-if="scope.row.status == 0" type="warning">未支付</el-tag>
                        </template>
                    </el-table-column>
                    <el-table-column width="225" prop="pay_time" label="充值时间" sortable="custom">
                        <template slot-scope="scope">
                            <div>下单时间：<span v-if="scope.row.created_time">{{ scope.row.created_time }}</span><span v-else>-</span></div>
                            <div>支付时间：<span v-if="scope.row.pay_time">{{ scope.row.pay_time }}</span><span v-else>-</span></div>
                        </template>
                    </el-table-column>
                    <!-- <el-table-column width="100" label="操作">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="handleDelete(scope.row.id)">删除</el-button>
                        </template>
                    </el-table-column> -->
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
                    order_sn: '',
                    date: '',
                }
            },
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
        },
        beforeMount() {
            document.getElementById('initLoading').style.display = 'none'
        },
        mounted() {
            this.load()
            let _this = this
            axios.get('/wp-json/ceo-shop/v1/data-dashboard/order')
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
                axios.get('/wp-json/ceo-shop/v1/data-order/index', {
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
                        order_sn: '',
                        date: '',
                    }
                }
                this.$refs.indexTable.clearSort()
                this.$refs.indexTable.clearFilter()
                this.load()
            },
            handleDelete(id) {
                this.loading = true
                let _this = this
                axios.post('/wp-json/ceo-shop/v1/data-order/delete', {
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
                axios.post('/wp-json/ceo-shop/v1/data-order/delete', {
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
