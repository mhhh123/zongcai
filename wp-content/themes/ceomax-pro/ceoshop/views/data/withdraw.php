<?php



// 提现类型
$typeFilters = [];
foreach (CeoShopCoreUser::WITHDRAW_TYPE as $tK => $tV) {
    $typeFilters[] = ['text' => $tV, 'value' => $tK];
}
$typeFilters = json_encode($typeFilters);
$typeFormatText = json_encode(CeoShopCoreUser::WITHDRAW_TYPE);

?>
<?php ceo_shop_echo_admin_loading() ?>
<div class="wrap">
    <div id="ceo-app">
        <h1 class="wp-heading-inline">提现记录</h1>
        <hr class="wp-header-end" style="margin-bottom: 20px">
        <el-row :gutter="15" style="margin-bottom: 30px;">
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="16">
                            <div class="card-row1-title">今日提现统计</div>
                            <div class="card-row1-number">{{ dashboardData[0].num4 }}元</div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-bank-card ceo-manage-icon ceo-manage-icon-blue"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="提现订单">
                                <template slot="formatter"> {{ dashboardData[0].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="现金提现">
                                <template slot="formatter"> {{ dashboardData[0].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="货币提现">
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
                            <div class="card-row1-title">本月提现统计</div>
                            <div class="card-row1-number">{{ dashboardData[1].num4 }}元</div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-bank-card ceo-manage-icon ceo-manage-icon-green"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="提现订单">
                                <template slot="formatter"> {{ dashboardData[1].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="现金提现">
                                <template slot="formatter"> {{ dashboardData[1].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="货币提现">
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
                            <div class="card-row1-title">本年提现统计</div>
                            <div class="card-row1-number">{{ dashboardData[2].num4 }}元</div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-bank-card ceo-manage-icon ceo-manage-icon-yellow"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="提现订单">
                                <template slot="formatter"> {{ dashboardData[2].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="现金提现">
                                <template slot="formatter"> {{ dashboardData[2].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="货币提现">
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
                            <div class="card-row1-title">全部提现统计</div>
                            <div class="card-row1-number">{{ dashboardData[3].num4 }}元</div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-bank-card ceo-manage-icon ceo-manage-icon-red"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="提现订单">
                                <template slot="formatter"> {{ dashboardData[3].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="现金提现">
                                <template slot="formatter"> {{ dashboardData[3].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="货币提现">
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
                    <el-form-item label="申请时间">
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
                    <el-table-column prop="id" label="ID" sortable="custom"></el-table-column>
                    <el-table-column prop="display_name" label="用户名"></el-table-column>
                    <el-table-column prop="apply_money" label="申请金额" sortable="custom"></el-table-column>
                    <el-table-column prop="actual_money" label="提现金额" sortable="custom"></el-table-column>
                    <el-table-column prop="after" label="收益余额"></el-table-column>
                    <el-table-column prop="service_money" label="手续费" sortable="custom"></el-table-column>
                    <el-table-column prop="withdraw_type" label="提现类型" column-key="withdraw_type" :filters="typeFilters">
                        <template slot-scope="scope">
                            <span>{{ typeFormatText[scope.row.withdraw_type] }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="status" label="提现状态" column-key="status" :filters="[{text: '提现中', value: 0}, {text: '已提现', value: 1}]" :filter-multiple="false">
                        <template slot-scope="scope">
                            <el-tag v-if="scope.row.status == 0" type="danger">提现中</el-tag>
                            <el-tag v-else-if="scope.row.status == 1" type="success">已提现</el-tag>
                        </template>
                    </el-table-column>
                    <el-table-column prop="created_time" label="申请时间" sortable="custom"></el-table-column>
                    <el-table-column prop="deal_time" label="处理时间" sortable="custom">
                        <template slot-scope="scope">
                            <span v-if="scope.row.deal_time">{{ scope.row.deal_time }}</span>
                            <span v-else>-</span>
                        </template>
                    </el-table-column>
                    <el-table-column label="管理">
                        <template slot-scope="scope">
                            <el-button size="mini" @click="onDetailOpen(scope.row)">查看详情</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-col>
        </el-row>
        <el-row>
            <el-col style="margin-top: 20px;display: flex;align-items: center;">
                <el-pagination class="pagination" background @size-change="handleSizeChange" @current-change="handleCurrentChange" :page-size="indexParams.pageSize" :current-page="indexParams.page" layout="total, sizes, prev, pager, next" :total="total">
                </el-pagination>
            </el-col>
        </el-row>

        <el-dialog title="提现详情" width="25%" :visible.sync="dialogDetailFormVisible">
            <el-descriptions :column="3">
                <el-descriptions-item label="用户名">{{ detailForm.row.display_name }}</el-descriptions-item>
                <el-descriptions-item label="申请金额">{{ detailForm.row.apply_money }}</el-descriptions-item>
                <el-descriptions-item label="提现金额">{{ detailForm.row.actual_money }}</el-descriptions-item>
                <el-descriptions-item label="收益金额">{{ detailForm.row.after }}</el-descriptions-item>
                <el-descriptions-item label="手续费">{{ detailForm.row.service_money }}</el-descriptions-item>
                <el-descriptions-item label="提现方式">{{ typeFormatText[detailForm.row.withdraw_type] }}</el-descriptions-item>
                <el-descriptions-item label="提现状态" v-if="detailForm.row.status == 0">未提现</el-descriptions-item>
                <el-descriptions-item width="155" label="提现状态" v-else-if="detailForm.row.status == 1">已提现</el-descriptions-item>
                <el-descriptions-item width="155" label="申请时间">{{ detailForm.row.created_time }}</el-descriptions-item>
            </el-descriptions>
            <el-divider></el-divider>
            <el-descriptions v-if="detailForm.row.info" :column="3">
                <el-descriptions-item label="支付宝" v-if="detailForm.row.withdraw_type == 1">{{ detailForm.row.info.alipay_account }}</el-descriptions-item>
                <el-descriptions-item label="真实姓名" v-if="detailForm.row.withdraw_type == 1">{{ detailForm.row.info.alipay_real_name }}</el-descriptions-item>
                <el-descriptions-item label="联系方式">{{ detailForm.row.info.contact_mobile }}</el-descriptions-item>
            </el-descriptions>
            <el-divider></el-divider>
            <el-form ref="detailForm" :model="detailForm" :rules="detailFormRules">
                <el-form-item label="提现状态">
                    <el-radio-group v-model="detailForm.status">
                        <el-radio :disabled="detailForm.row.status == 1" :label="0">提现中</el-radio>
                        <el-radio :disabled="detailForm.row.status == 1" :label="1">已提现</el-radio>
                    </el-radio-group>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button @click="dialogDetailFormVisible = false" size="medium">取 消</el-button>
                <el-button v-if="detailForm.row.status != 1" type="primary" :loading="detailFormLoading" @click="onDetailUpdate" size="medium">确 定
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
                    order_sn: '',
                    date: '',
                },
            },
            typeFilters: <?php echo $typeFilters ?>,
            typeFormatText: <?php echo $typeFormatText ?>,
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
                        picker.$emit('pick', [start, end]);
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
                status: 0,
            },
            detailFormRules: {},
        },
        beforeMount() {
            document.getElementById('initLoading').style.display = 'none'
        },
        mounted() {
            this.load()
            let _this = this
            axios.get('/wp-json/ceo-shop/v1/data-dashboard/withdraw')
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
                axios.get('/wp-json/ceo-shop/v1/data-withdraw/index', {
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
                this.detailForm.status = parseInt(row.status)
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
                    '/wp-json/ceo-shop/v1/data-withdraw/update',
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
                            status: 0,
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
</style>
