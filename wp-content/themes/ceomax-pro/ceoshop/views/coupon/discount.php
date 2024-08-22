<?php

$allowTypesFilters = [];
foreach (CeoShopCoreCoupon::DISCOUNT_USE_TYPE as $tK => $tV) {
    $allowTypesFilters[] = ['text' => $tV, 'value' => $tK];
}
$allowTypesFilters = json_encode($allowTypesFilters);
$allowTypesFormatText = json_encode(CeoShopCoreCoupon::DISCOUNT_USE_TYPE);

?>
<?php ceo_shop_echo_admin_loading() ?>
<div class="wrap">
    <div id="ceo-app">
        <div v-show="!detailVisible">
            <h1 class="wp-heading-inline">代金券管理</h1>
            <hr class="wp-header-end" style="margin-bottom: 8px">
            <el-row>
                <el-col :span="20">
                    <el-form :inline="true" :model="indexParams.search" size="mini">
                        <el-form-item label="代金券名称">
                            <el-input v-model="indexParams.search.title" placeholder="请输入代金券名称" clearable></el-input>
                        </el-form-item>
                        <el-form-item label="代金券卡密">
                            <el-input v-model="indexParams.search.code" placeholder="请输入代金券卡密" clearable></el-input>
                        </el-form-item>
                        <el-form-item>
                            <el-button type="primary" @click="onSearch">搜索</el-button>
                            <el-button @click="onReset">重置</el-button>
                        </el-form-item>
                    </el-form>
                </el-col>
                <el-col :span="4" style="text-align: right">
                    <el-button type="primary" icon="el-icon-document-add" size="mini" @click="dialogGenerateFormVisible = true">代金券生成
                    </el-button>
                    <!-- <el-button type="primary" icon="el-icon-download" size="mini" @click="dialogExportFormVisible = true">代金券导出
                    </el-button> -->
                    <el-button type="primary" icon="el-icon-position" size="mini" @click="dialogGiveFormVisible = true">代金券赠送
                    </el-button>
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
                        <el-table-column prop="title" label="代金券名称"></el-table-column>
                        <el-table-column prop="code" label="代金券卡密"></el-table-column>
                        <el-table-column prop="money" label="代金券面值" sortable="custom"></el-table-column>
                        <el-table-column prop="validity" label="代金券有效期限" sortable="custom">
                            <template slot-scope="scope">
                                <span>{{ scope.row.validity }}天</span>
                            </template>
                        </el-table-column>
                        <el-table-column prop="allow_types" label="代金券使用范围" column-key="allow_types" :filters="allowTypesFilters">
                            <template slot-scope="scope">
                                <span v-if="scope.row.allow_types.length == 0">全部可用</span>
                                <el-tag v-else v-for="type in scope.row.allow_types" style="margin-right: 4px; margin-bottom: 2px;"> {{ allowTypesFormatText[type] }}
                                </el-tag>
                            </template>
                        </el-table-column>
                        <el-table-column prop="condition_money" label="代金券使用门槛"></el-table-column>
                        <el-table-column prop="created_time" label="生成时间" sortable="custom"></el-table-column>
                        <el-table-column prop="status" label="卡密状态" column-key="status" :filters="[{text: '有使用', value: 1}, {text: '无使用', value: 0}]" :filter-multiple="false">
                            <template slot-scope="scope">
                                <el-tag v-if="scope.row.status == 1" type="warning">已使用</el-tag>
                                <el-tag v-else-if="scope.row.status == 0" type="success">未使用</el-tag>
                            </template>
                        </el-table-column>
                        <el-table-column label="持有用户">
                            <template slot-scope="scope">
                                <el-button size="mini" @click="onDetailOpen(scope.row.id)">查看详情</el-button>
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

            <el-dialog title="代金券生成" width="25%" :visible.sync="dialogGenerateFormVisible">
                <el-form ref="generateForm" :model="generateForm" :rules="generateFormRules">
                    <el-form-item label="代金券名称" prop="title">
                        <el-input v-model="generateForm.title" placeholder="如注册奖励代金券"></el-input>
                    </el-form-item>
                    <el-form-item label="代金券面值" prop="money">
                        <el-input-number :min="1" :precision="0" v-model="generateForm.money" controls-position="right" style="width: 100%" placeholder="请输入代金券面值">
                        </el-input-number>
                    </el-form-item>
                    <el-form-item label="代金券有效期限" prop="validity">
                        <el-input-number :min="1" :precision="0" v-model="generateForm.validity" controls-position="right" style="width: 100%" placeholder="自领取日起有效期多久">
                        </el-input-number>
                    </el-form-item>
                    <el-form-item label="代金券使用范围" prop="allow_types">
                        <el-select v-model="generateForm.allow_types" multiple style="width: 100%" placeholder="请选择代金券使用范围">
                            <el-option v-for="(value, key) in allowTypesFormatText" :key="key" :label="value" :value="key"></el-option>
                        </el-select>
                        <span class="form-help-text">不填写默认对全部范围生效</span>
                    </el-form-item>
                    <el-form-item label="代金券使用门槛" prop="condition_money">
                        <el-input-number :min="0" :precision="0" v-model="generateForm.condition_money" controls-position="right" style="width: 100%" placeholder="商品满多少时可用">
                        </el-input-number>
                    </el-form-item>
                </el-form>
                <div slot="footer" class="dialog-footer">
                    <el-button @click="dialogGenerateFormVisible = false" size="medium">取 消</el-button>
                    <el-button type="primary" :loading="generateLoading" @click="onCodeCreate" size="medium">确 定
                    </el-button>
                </div>
            </el-dialog>

            <el-dialog title="代金券导出" width="25%" :visible.sync="dialogExportFormVisible">
                <el-form :model="generateForm">
                    <el-form-item label="卡密状态">
                        <el-radio v-model="exportForm.status" :label="-1">全部</el-radio>
                        <el-radio v-model="exportForm.status" :label="1">已使用</el-radio>
                        <el-radio v-model="exportForm.status" :label="0">未使用</el-radio>
                    </el-form-item>
                </el-form>
                <div slot="footer" class="dialog-footer">
                    <el-button @click="dialogExportFormVisible = false" size="medium">取 消</el-button>
                    <el-button type="primary" :loading="exportLoading" @click="onCodeExport" size="medium">确 定</el-button>
                </div>
            </el-dialog>

            <el-dialog title="代金券赠送" width="25%" :visible.sync="dialogGiveFormVisible">
                <el-form ref="giveForm" :model="giveForm" :rules="giveFormRules">
                    <el-form-item label="用户名" prop="user">
                        <el-input v-model="giveForm.user" placeholder="请输入用户名"></el-input>
                    </el-form-item>
                    <el-form-item label="代金券卡密" prop="code">
                        <el-input v-model="giveForm.code" placeholder="请输入代金券卡密"></el-input>
                    </el-form-item>
                </el-form>
                <div slot="footer" class="dialog-footer">
                    <el-button @click="dialogGiveFormVisible = false" size="medium">取 消</el-button>
                    <el-button type="primary" :loading="giveLoading" @click="onCodeGive" size="medium">确 定
                    </el-button>
                </div>
            </el-dialog>
        </div>
        <div v-show="detailVisible">
            <h1 class="wp-heading-inline">代金券详情</h1>
            <el-link type="info" @click="onDetailClose">返回</el-link>
            <hr class="wp-header-end" style="margin-bottom: 8px">
            <el-row>
                <el-col :span="20">
                    <el-form :inline="true" :model="detailParams.search" size="mini">
                        <el-form-item label="用户名">
                            <el-input v-model="detailParams.search.display_name" placeholder="请输入用户名" clearable></el-input>
                        </el-form-item>
                        <el-form-item>
                            <el-button type="primary" @click="onDetailSearch">搜索</el-button>
                            <el-button @click="onDetailReset">重置</el-button>
                        </el-form-item>
                    </el-form>
                </el-col>
            </el-row>
            <el-row>
                <el-col>
                    <el-table ref="detailTable" v-loading="detailLoading" :data="detailTableDate" @sort-change="handleDetailSortChange" @filter-change="filterDetailChange" stripe style="width: 100%">
                        <el-table-column type="selection" width="55"></el-table-column>
                        <el-table-column prop="id" label="ID" sortable="custom"></el-table-column>
                        <el-table-column prop="display_name" label="用户列表"></el-table-column>
                        <el-table-column prop="status" label="使用状态" column-key="status" :filters="[{text: '已使用', value: 1}, {text: '未使用', value: 0}]" :filter-multiple="false">
                            <template slot-scope="scope">
                                <el-tag v-if="scope.row.status == 1" type="warning">已使用</el-tag>
                                <el-tag v-else-if="scope.row.status == 0" type="success">未使用</el-tag>
                            </template>
                        </el-table-column>
                        <el-table-column prop="use_product_id" label="使用商品">
                            <template slot-scope="scope">
                                <span v-if="scope.row.status == 1">{{ scope.row.post_title }}</span>
                                <span v-else>-</span>
                            </template>
                        </el-table-column>
                        <el-table-column prop="use_time" label="使用时间">
                            <template slot-scope="scope">
                                <span v-if="scope.row.status == 1">{{ scope.row.use_time }}</span>
                                <span v-else>-</span>
                            </template>
                        </el-table-column>
                        <!-- <el-table-column width="100" label="操作">
                            <template slot-scope="scope">
                                <el-button size="mini" type="danger" @click="handleDetailDelete(scope.row.id)">删除</el-button>
                            </template>
                        </el-table-column> -->
                    </el-table>
                </el-col>
            </el-row>
            <el-row>
                <el-col>
                    <el-button style="margin-top: 15px" size="mini" type="danger" @click="handleDetailMulDelete()">批量删除</el-button>
                    <el-pagination class="pagination" background @size-change="handleDetailSizeChange" @current-change="handleDetailCurrentChange" :page-size="detailParams.pageSize" :current-page="detailParams.page" layout="total, sizes, prev, pager, next" :total="total">
                    </el-pagination>
                </el-col>
            </el-row>
        </div>
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
                    title: '',
                    code: '',
                },
            },
            allowTypesFilters: <?php echo $allowTypesFilters ?>,
            allowTypesFormatText: <?php echo $allowTypesFormatText ?>,

            // 生成
            dialogGenerateFormVisible: false,
            generateLoading: false,
            generateForm: {
                title: '',
                money: undefined,
                validity: undefined,
                allow_types: [],
                condition_money: undefined
            },
            generateFormRules: {
                title: [{
                    required: true,
                    message: '请输入代金券名称',
                    trigger: 'blur'
                }],
                money: [{
                    required: true,
                    message: '请输入会员优惠价面值',
                    trigger: 'blur'
                }],
                validity: [{
                    required: true,
                    message: '请输入会员优惠价有效期限',
                    trigger: 'blur'
                }],
                condition_money: [{
                    required: true,
                    message: '请输入代金券使用门槛',
                    trigger: 'blur'
                }],
            },

            // 导出
            dialogExportFormVisible: false,
            exportLoading: false,
            exportForm: {
                status: -1,
            },

            // 赠送
            dialogGiveFormVisible: false,
            giveLoading: false,
            giveForm: {
                user: '',
                code: '',
            },
            giveFormRules: {
                user: [{
                    required: true,
                    message: '请输入用户名',
                    trigger: 'blur'
                }],
                code: [{
                    required: true,
                    message: '请输入代金券卡密',
                    trigger: 'blur'
                }],
            },

            // 详情列表
            detailVisible: false,
            detailLoading: false,
            detailTableDate: [],
            detailTotal: 0,
            detailParams: {
                page: 1,
                pageSize: 10,
                sort: {},
                filter: {},
                search: {
                    coupon_discount_id: 0,
                    display_name: '',
                },
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
                axios.get('/wp-json/ceo-shop/v1/coupon-discount/index', {
                        params: this.indexParams
                    })
                    .then(function(res) {
                        _this.tableData = res.data.data
                        _this.total = res.data.pagination.total
                    })
                    .catch(function(err) {
                        console.log(err)
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
            onCodeCreate() {
                let validFlag = true
                this.$refs.generateForm.validate(function(valid) {
                    if (!valid) {
                        validFlag = false
                    }
                });
                if (!validFlag) {
                    return false
                }

                this.generateLoading = true
                let _this = this
                axios.post(
                    '/wp-json/ceo-shop/v1/coupon-discount/create',
                    this.generateForm, {
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
                        _this.generateForm = {
                            count: undefined,
                            money: undefined,
                            len: 20,
                        }
                        _this.dialogGenerateFormVisible = false
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
                    _this.generateLoading = false
                });
            },
            onCodeExport() {
                this.exportLoading = true
                let link = document.createElement('a');
                link.style.display = 'none';
                document.body.appendChild(link);
                let url = '/wp-json/ceo-shop/v1/coupon-discount/export?status=' + this.exportForm.status
                link.href = url;
                link.setAttribute('download', '代金券导出.csv');
                link.click();
                URL.revokeObjectURL(url);
                document.body.removeChild(link);

                this.$message({
                    message: '导出成功',
                    type: 'success',
                    offset: 60,
                });
                this.exportForm = {
                    status: -1,
                }
                this.exportLoading = false
                this.dialogExportFormVisible = false
            },
            onCodeGive() {
                let validFlag = true
                this.$refs.giveForm.validate(function(valid) {
                    if (!valid) {
                        validFlag = false
                    }
                });
                if (!validFlag) {
                    return false
                }

                this.giveLoading = true
                let _this = this
                axios.post(
                    '/wp-json/ceo-shop/v1/coupon-discount/give',
                    this.giveForm, {
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
                        _this.giveForm = {
                            user: '',
                            code: '',
                        }
                        _this.dialogGiveFormVisible = false
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
                    _this.giveLoading = false
                });
            },

            // 详情列表
            onDetailOpen(id) {
                this.detailVisible = true
                this.detailParams.search.coupon_discount_id = id
                this.onDetailReset()
            },
            onDetailClose() {
                this.detailVisible = false
                this.detailTableDate = []
            },
            detailLoad() {
                this.detailLoading = true
                let _this = this
                axios.get('/wp-json/ceo-shop/v1/coupon-discount/detail-index', {
                        params: this.detailParams
                    })
                    .then(function(res) {
                        _this.detailTableDate = res.data.data
                        _this.detailTotal = res.data.pagination.total
                    })
                    .catch(function(err) {
                        console.log(err)
                    })
                    .then(function() {
                        _this.detailLoading = false
                    });
            },
            handleDetailSizeChange(val) {
                this.detailParams.pageSize = val
                this.detailParams.page = 1
                this.detailLoad()
            },
            handleDetailCurrentChange(val) {
                this.detailParams.page = val
                this.detailLoad()
            },
            handleDetailSortChange(val) {
                this.detailParams.sort = {
                    key: val.prop,
                    order: val.order,
                }
                this.detailLoad()
            },
            filterDetailChange(val) {
                for (let i in val) {
                    this.detailParams.filter[i] = val[i]
                }
                this.detailLoad()
            },
            onDetailSearch() {
                this.detailLoad()
            },
            onDetailReset() {
                let temp_coupon_discount_id = this.detailParams.search.coupon_discount_id
                this.detailParams = {
                    page: 1,
                    pageSize: 10,
                    sort: {},
                    filter: {},
                    search: {
                        display_name: '',
                        coupon_discount_id: temp_coupon_discount_id,
                    },
                }
                this.$refs.detailTable.clearSort()
                this.$refs.detailTable.clearFilter()
                this.detailLoad()
            },
            handleDelete(id) {
                this.loading = true
                let _this = this
                axios.post('/wp-json/ceo-shop/v1/coupon-discount/delete', {
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
                axios.post('/wp-json/ceo-shop/v1/coupon-discount/delete', {
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
            handleDetailDelete(id) {
                this.loading = true
                let _this = this
                axios.post('/wp-json/ceo-shop/v1/coupon-discount/detail-delete', {
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
                            _this.detailLoad()
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
            handleDetailMulDelete() {
                let ids = []
                this.$refs.detailTable.selection.forEach(function(item) {
                    ids.push(item.id)
                })
                this.loading = true
                let _this = this
                axios.post('/wp-json/ceo-shop/v1/coupon-discount/detail-delete', {
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
                            _this.detailLoad()
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
