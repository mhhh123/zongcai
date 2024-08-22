<?php



// 商品类型
$productTypeFilters = [];
foreach (CeoShopCoreProduct::PRODUCT_NAME as $tK => $tV) {
    $productTypeFilters[] = ['text' => $tV, 'value' => $tK];
}
$productTypeFilters = json_encode($productTypeFilters);
$productTypeFormatText = json_encode(CeoShopCoreProduct::PRODUCT_NAME);

?>
<?php ceo_shop_echo_admin_loading() ?>
<div class="wrap">
    <div id="ceo-app">
        <h1 class="wp-heading-inline">下载记录</h1>
        <hr class="wp-header-end" style="margin-bottom: 20px">
        <el-row :gutter="15" style="margin-bottom: 30px;">
            <el-col :span="6">
                <el-card>
                    <el-row>
                        <el-col :span="16">
                            <div class="card-row1-title">今日下载统计</div>
                            <div class="card-row1-number">{{ dashboardData[0].num4 }}次</div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-download ceo-manage-icon ceo-manage-icon-blue"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="免费产品下载">
                                <template slot="formatter"> {{ dashboardData[0].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="VIP产品下载">
                                <template slot="formatter"> {{ dashboardData[0].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="产品下载数">
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
                            <div class="card-row1-title">本月下载统计</div>
                            <div class="card-row1-number">{{ dashboardData[1].num4 }}次</div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-download ceo-manage-icon ceo-manage-icon-green"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="免费产品下载">
                                <template slot="formatter"> {{ dashboardData[1].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="VIP产品下载">
                                <template slot="formatter"> {{ dashboardData[1].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="产品下载数">
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
                            <div class="card-row1-title">本年下载统计</div>
                            <div class="card-row1-number">{{ dashboardData[2].num4 }}次</div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-download ceo-manage-icon ceo-manage-icon-yellow"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="免费产品下载">
                                <template slot="formatter"> {{ dashboardData[2].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="VIP产品下载">
                                <template slot="formatter"> {{ dashboardData[2].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="产品下载数">
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
                            <div class="card-row1-title">全部下载统计</div>
                            <div class="card-row1-number">{{ dashboardData[3].num4 }}次</div>
                        </el-col>
                        <el-col :span="8">
                            <i class="el-icon-download ceo-manage-icon ceo-manage-icon-red"></i>
                        </el-col>
                    </el-row>
                    <el-divider></el-divider>
                    <el-row>
                        <el-col :span="8">
                            <el-statistic title="免费产品下载">
                                <template slot="formatter"> {{ dashboardData[3].num1 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="VIP产品下载">
                                <template slot="formatter"> {{ dashboardData[3].num2 }}条 </template>
                            </el-statistic>
                        </el-col>
                        <el-col :span="8">
                            <el-statistic title="产品下载数">
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
                    <el-form-item label="记录时间">
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
                    <el-table-column prop="user_vip_grade" label="用户类型"></el-table-column>
                    <el-table-column prop="post_title" label="商品名称"></el-table-column>
                    <el-table-column prop="sku" label="商品套餐">
                        <template slot-scope="scope">
                            <span>套餐{{ scope.row.sku }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="product_type" label="商品类型" column-key="product_type" :filters="productTypeFilters">
                        <template slot-scope="scope">
                            <span>{{ productTypeFormatText[scope.row.product_type] }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="ip" label="IP地址"></el-table-column>
                    <el-table-column width="155" prop="created_time" label="记录时间"></el-table-column>
                    <el-table-column prop="today_max_count" label="今日免费次数"></el-table-column>
                    <el-table-column prop="today_use_count" label="今日使用次数"></el-table-column>
                    <el-table-column prop="today_available_count" label="剩余可用次数"></el-table-column>
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
                    date: '',
                },
            },
            productTypeFilters: <?php echo $productTypeFilters ?>,
            productTypeFormatText: <?php echo $productTypeFormatText ?>,
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
            axios.get('/wp-json/ceo-shop/v1/data-dashboard/download')
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
                axios.get('/wp-json/ceo-shop/v1/data-download/index', {
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
            handleDelete(id) {
                this.loading = true
                let _this = this
                axios.post('/wp-json/ceo-shop/v1/data-download/delete', {
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
                axios.post('/wp-json/ceo-shop/v1/data-download/delete', {
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
