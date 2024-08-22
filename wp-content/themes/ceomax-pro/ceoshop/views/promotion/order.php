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
        <h1 class="wp-heading-inline">推广订单</h1>
        <hr class="wp-header-end" style="margin-bottom: 8px">
        <el-row>
            <el-col>
                <el-form :inline="true" :model="indexParams.search" size="mini">
                    <el-form-item label="消费者">
                        <el-input v-model="indexParams.search.display_name" placeholder="请输入用户名" clearable></el-input>
                    </el-form-item>

                    <el-form-item label="结算时间">
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
                    <el-table-column prop="buyer_display_name" label="消费者"></el-table-column>
                    <el-table-column prop="post_title" label="购买商品"></el-table-column>
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
                    <el-table-column prop="money" label="商品售价"></el-table-column>
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
                    <el-table-column prop="actual_money" label="消费金额"></el-table-column>
                    <el-table-column prop="p_display_name" label="收益人"></el-table-column>
                    <el-table-column prop="commission" label="佣金比例" sortable="custom">
                        <template slot-scope="scope">
                            <span>{{ scope.row.commission }}%</span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="commission" label="佣金收益" sortable="custom">
                        <template slot-scope="scope">
                            <span v-if="scope.row.commission_type == 1">{{ scope.row.commission }}收益</span>
                            <span v-if="scope.row.commission_type == 2">{{ scope.row.commission }}货币</span>
                        </template>
                    </el-table-column>
                    <el-table-column width="155" prop="created_time" label="结算时间" sortable="custom"></el-table-column>
                </el-table>
            </el-col>
        </el-row>
        <el-row>
            <el-col style="margin-top: 20px;display: flex;align-items: center;">
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
                        picker.$emit('pick', [start, end]);
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
                axios.get('/wp-json/ceo-shop/v1/promotion-order/index', {
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
            }
        }
    })
</script>
