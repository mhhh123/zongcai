<?php





// 商品类型
$productTypeFilters = [];
foreach ([
    'virtual' => '虚拟资源',
    'entity' => '实物商品',
    'video' => '视频课程',
    'card' => '卡密发放',
] as $tK => $tV) {
    $productTypeFilters[] = ['text' => $tV, 'value' => $tK];
}

$productTypeFilters = json_encode($productTypeFilters);
$productTypeCodeFormatText = json_encode(CeoShopCoreProduct::PRODUCT_TYPE);
$productTypeFormatText = json_encode(CeoShopCoreProduct::PRODUCT_NAME);

$categories = get_categories();
function get_categories_by_hierarchy($categories, $parent = 0, $level = 0)
{
    $result = array();
    foreach ($categories as $category) {
        if ($category->parent == $parent) {
            $category->level = $level;
            $result[] = $category;
            $result = array_merge($result, get_categories_by_hierarchy($categories, $category->term_id, $level + 1));
        }
    }
    return $result;
}
$sorted_categories = get_categories_by_hierarchy($categories);

$echoArr = [];
foreach ($sorted_categories as $category) {
    $echoArr[] = [
        'label' => str_repeat("&nbsp;&nbsp;", $category->level) . $category->name,
        'name' => $category->name,
        'value' => $category->term_id,
    ];
}

$echoArr = json_encode($echoArr);

?>
<?php ceo_shop_echo_admin_loading() ?>
<div class="wrap">
    <div id="ceo-app">
        <el-row>
            <el-col :span=2>
                <h1 class="wp-heading-inline">批量修改</h1>
                <hr class="wp-header-end" style="margin-bottom: 8px">
            </el-col>
            <el-col :span=20>
                <el-steps :active="stepNum" style="margin: 5px 0 20px">
                    <el-step title="筛选商品">1</el-step>
                    <el-step title="批量修改">2</el-step>
                    <el-step title="修改完成">3</el-step>
                </el-steps>
            </el-col>
        </el-row>
        <div v-show="stepNum == 1">
            <el-alert style="margin-bottom: 20px" title="仅支持批量修改单套餐商品" type="warning">
            </el-alert>
            <el-row>
                <el-col>
                    <el-form :inline="true" :model="indexParams.search" size="mini">
                        <el-form-item label="分类">
                            <el-select v-model="indexParams.search.term_id" placeholder="请选择" clearable>
                                <el-option v-for="item in echoArr" :key="item.value" :label="item.name" :value="item.value">
                                    <span v-html="item.label"></span>
                                </el-option>
                            </el-select>
                        </el-form-item>
                        <el-form-item label="商品名称">
                            <el-input v-model="indexParams.search.post_title" placeholder="商品名称" clearable></el-input>
                        </el-form-item>
                        <el-form-item label="作者">
                            <el-input v-model="indexParams.search.display_name" placeholder="作者" clearable></el-input>
                        </el-form-item>
                        <el-form-item label="发布时间">
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
                        <el-table-column prop="ID" label="ID" sortable="custom"></el-table-column>
                        <el-table-column prop="post_title" label="商品名称"></el-table-column>
                        <el-table-column prop="display_name" label="作者"></el-table-column>
                        <el-table-column prop="product_type" label="商品类型" column-key="product_type" :filters="productTypeFilters">
                            <template slot-scope="scope">
                                <span v-if="scope.row.product_type">{{ productTypeFormatText[productTypeCodeFormatText[scope.row.product_type]] }}</span>
                                <span v-else>文章内容</span>
                            </template>
                        </el-table-column>
                        <el-table-column prop="product_price" label="商品售价">
                            <template slot-scope="scope">
                                <span v-if="scope.row.product_price">{{ scope.row.product_price }}</span>
                                <span v-else>-</span>
                            </template>
                        </el-table-column>
                        <el-table-column prop="product_sale_data" label="销售数据">
                            <template slot-scope="scope">
                                <span v-if="scope.row.product_sale_data" v-html="scope.row.product_sale_data"></span>
                                <span v-else>-</span>
                            </template>
                        </el-table-column>
                        <el-table-column prop="product_vip_discount" label="VIP折扣">
                            <template slot-scope="scope">
                                <span v-if="scope.row.product_vip_discount != '' && scope.row.product_vip_discount != '无'" v-html="scope.row.product_vip_discount"></span>
                                <span v-else>-</span>
                            </template>
                        </el-table-column>
                        <el-table-column prop="product_sku" label="商品套餐">
                            <template slot-scope="scope">
                                <span v-if="scope.row.product_sku != '' && scope.row.product_sku != '无'">{{ scope.row.product_sku }}</span>
                                <span v-else>-</span>
                            </template>
                        </el-table-column>
                        <el-table-column width="155" prop="post_date" label="发布时间" sortable="custom"></el-table-column>
                    </el-table>
                </el-col>
            </el-row>
            <el-row>
                <el-col style="margin-top: 20px;display: flex;align-items: center;">
                    <el-button style="display: inline-block;margin-right: 20px;"  size="mini" type="primary" @click="onUpdateShow">批量修改</el-button>
                    <el-pagination class="pagination" background @size-change="handleSizeChange" @current-change="handleCurrentChange" :page-size="indexParams.pageSize" :current-page="indexParams.page" layout="total, sizes, prev, pager, next" :total="total">
                    </el-pagination>
                </el-col>
            </el-row>
        </div>
        <div v-show="stepNum == 2">
            <el-card>
                <el-row>
                    <el-col :span="16" :offset="4">
                        <el-form ref="updateForm" label-position="top" :model="updateForm" :rules="updateFormRules">
                            <el-form-item label="价格" prop="price">
                                <el-input-number :min="0" :precision="2" v-model="updateForm.price" controls-position="right" style="width: 100%" placeholder="请输入价格，留空则不更改">
                                </el-input-number>
                            </el-form-item>
                            <el-form-item label="VIP专属" prop="exclusive">
                                <el-radio-group v-model="updateForm.exclusive" style="width: 100%">
                                    <el-radio :label="-1">不更改</el-radio>
                                    <el-radio :label="1">开启</el-radio>
                                    <el-radio :label="0">关闭</el-radio>
                                </el-radio-group>
                            </el-form-item>
                            <el-form-item label="VIP折扣" prop="discount">
                                <span>统一折扣设置</span>
                                <el-slider v-model="updateForm.discountSlider" @input="discountSliderInput" :min="-1" :max="10">
                                </el-slider>
                                <div class="vipDiscountWrap">
                                    <div v-for="(item, index) in vipArr" class="vipDiscountItem">
                                        <div>{{ item.text }}VIP折扣</div>
                                        <el-input-number :min="0" :precision="2" v-model="updateForm.discount[index]" controls-position="right" placeholder="留空则不更改">
                                        </el-input-number>
                                    </div>
                                </div>
                            </el-form-item>
                            <el-form-item label="营销策略" prop="marketing">
                                <el-radio-group v-model="updateForm.marketing" style="width: 100%">
                                    <el-radio :label="-1">不更改</el-radio>
                                    <el-radio :label="1">开启</el-radio>
                                    <el-radio :label="0">关闭</el-radio>
                                </el-radio-group>
                            </el-form-item>
                            <div v-show="updateForm.marketing == 1">
                                <el-form-item label="赠送积分" prop="marketing_integral">
                                    <el-input-number :min="0" :precision="0" v-model="updateForm.marketing_integral" controls-position="right" style="width: 100%" placeholder="请输入赠送积分，留空则不更改">
                                    </el-input-number>
                                </el-form-item>
                                <el-form-item label="赠送代金券" prop="marketing_coupon_discount">
                                    <el-input v-model="updateForm.marketing_coupon_discount" style="width: 100%" placeholder="请输入赠送代金券，留空则不更改"></el-input>
                                </el-form-item>
                                <el-form-item label="赠送VIP优惠券" prop="marketing_coupon_vip">
                                    <el-input v-model="updateForm.marketing_coupon_vip" style="width: 100%" placeholder="请输入赠送VIP优惠券，留空则不更改"></el-input>
                                </el-form-item>
                            </div>
                            <el-form-item label="支付方式" prop="pay">
                                <el-radio-group v-model="updateForm.pay" style="width: 100%">
                                    <el-radio :label="-1">不更改</el-radio>
                                    <el-radio :label="1">任意支付</el-radio>
                                    <el-radio :label="2">余额支付</el-radio>
                                    <el-radio :label="3">在线支付</el-radio>
                                </el-radio-group>
                            </el-form-item>
                        </el-form>
                    </el-col>
                </el-row>
                <el-row>
                    <el-col :span="16" :offset="4">
                        <el-button type="primary" :loading="updateLoading" @click="onUpdateSubmit" size="medium">确定修改</el-button>
                        <el-button @click="stepNum = 1" size="medium">取消修改</el-button>
                    </el-col>
                </el-row>
            </el-card>
        </div>
        <div v-show="stepNum == 3">
            <el-result icon="success" title="修改完成">
                <template slot="extra">
                    <el-button type="primary" size="medium" @click="stepNum = 1">返回</el-button>
                </template>
            </el-result>
        </div>
    </div>
</div>

<script>
    new Vue({
        el: '#ceo-app',
        data: {
            stepNum: 1,
            loading: false,
            tableData: [],
            total: 0,
            indexParams: {
                page: 1,
                pageSize: 10,
                sort: {},
                filter: {},
                search: {
                    term_id: '',
                    post_title: '',
                    display_name: '',
                    date: '',
                },
            },
            productTypeFilters: <?php echo $productTypeFilters ?>,
            productTypeCodeFormatText: <?php echo $productTypeCodeFormatText ?>,
            productTypeFormatText: <?php echo $productTypeFormatText ?>,
            vipArr: <?php echo CeoShopCoreUser::getVipGradeList(1) ?>,
            echoArr: <?php echo $echoArr ?>,
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
            updateLoading: false,
            updateForm: {
                price: undefined,
                exclusive: -1,
                discountSlider: -1,
                discount: [],
                marketing: -1,
                marketing_integral: undefined,
                marketing_coupon_discount: undefined,
                marketing_coupon_vip: undefined,
                pay: -1,
            },
            updateFormRules: {},
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
                axios.get('/wp-json/ceo-shop/v1/data-update/index', {
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
                        term_id: '',
                        post_title: '',
                        display_name: '',
                        date: '',
                    },
                }
                this.$refs.indexTable.clearSort()
                this.$refs.indexTable.clearFilter()
                this.load()
            },
            onUpdateShow() {
                let ids = []
                this.$refs.indexTable.selection.forEach(function(item) {
                    ids.push(item.ID)
                })

                if (ids.length <= 0) {
                    this.$message({
                        message: '请先选择要批量修改的商品',
                        type: 'error',
                        offset: 60,
                    });
                    return
                }

                this.stepNum = 2
            },
            onUpdateSubmit() {
                let ids = []
                this.$refs.indexTable.selection.forEach(function(item) {
                    ids.push(item.ID)
                })
                this.updateForm.ids = ids
                let _this = this

                this.$confirm('批量修改后将不可直接复原，为避免错误操作，建议先备份数据库后再进行修改！', '提示', {
                    confirmButtonText: '确定修改',
                    cancelButtonText: '取消修改',
                    type: 'warning'
                }).then(function() {
                    axios.post('/wp-json/ceo-shop/v1/data-update/update', _this.updateForm, {
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
                                _this.stepNum = 3
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
                        .then(function() {});
                }).catch(function() {});


            },
            handleDelete(id) {
                this.loading = true
                let _this = this
                axios.post('/wp-json/ceo-shop/v1/data-update/delete', {
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
                    ids.push(item.ID)
                })
                this.loading = true
                let _this = this
                axios.post('/wp-json/ceo-shop/v1/data-update/delete', {
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
            },
            discountSliderInput(val) {
                this.updateForm.discount.forEach(function(item, index, arr) {
                    if (val == -1) {
                        arr[index] = undefined
                    } else {
                        arr[index] = val
                    }
                })
            }
        }
    })
</script>

<style scoped>
    .el-form-item__label {
        font-weight: 700;
        font-size: 15px;
    }

    .vipDiscountWrap {
        display: flex;
    }

    .vipDiscountItem {
        margin-right: 15px;
    }
</style>
