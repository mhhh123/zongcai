<?php ceo_shop_echo_admin_loading() ?>
<div class="wrap">
    <div id="ceo-app">
        <h1 class="wp-heading-inline">卡密管理</h1>
        <hr class="wp-header-end" style="margin-bottom: 8px">
        <el-row>
            <el-col :span="20">
                <el-form :inline="true" :model="indexParams.search" size="mini">
                    <el-form-item label="使用用户">
                        <el-input v-model="indexParams.search.display_name" placeholder="请输入使用用户" clearable></el-input>
                    </el-form-item>
                    <el-form-item label="卡密内容">
                        <el-input v-model="indexParams.search.code" placeholder="请输入卡密内容" clearable></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="onSearch">搜索</el-button>
                        <el-button @click="onReset">重置</el-button>
                    </el-form-item>
                </el-form>
            </el-col>
            <el-col :span="4" style="text-align: right">
                <el-button type="primary" icon="el-icon-document-add" size="mini" @click="dialogGenerateFormVisible = true">卡密生成
                </el-button>
                <el-button type="primary" icon="el-icon-download" size="mini" @click="dialogExportFormVisible = true">卡密导出
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
                    <el-table-column prop="code" label="卡密内容"></el-table-column>
                    <el-table-column prop="money" label="卡密面值" sortable="custom"></el-table-column>
                    <el-table-column prop="created_time" label="生成时间" sortable="custom"></el-table-column>
                    <el-table-column prop="status" label="使用状态" column-key="status" :filters="[{text: '已使用', value: 1}, {text: '未使用', value: 0}]" :filter-multiple="false">
                        <template slot-scope="scope">
                            <el-tag v-if="scope.row.status == 1" type="success">已使用</el-tag>
                            <el-tag v-else-if="scope.row.status == 0" type="warning">未使用</el-tag>
                        </template>
                    </el-table-column>
                    <el-table-column prop="use_time" label="使用时间" sortable="custom">
                        <template slot-scope="scope">
                            <span v-if="scope.row.status == 1">{{ scope.row.use_time }}</span>
                            <span v-else>-</span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="display_name" label="使用用户">
                        <template slot-scope="scope">
                            <span v-if="scope.row.status == 1">{{ scope.row.display_name }}</span>
                            <span v-else>-</span>
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

        <el-dialog title="卡密生成" width="25%" :visible.sync="dialogGenerateFormVisible">
            <el-form ref="generateForm" :model="generateForm" :rules="generateFormRules">
                <el-form-item label="生成数量" prop="count">
                    <el-input-number :min="1" :precision="0" v-model="generateForm.count" controls-position="right" style="width: 100%" placeholder="请输入生成数量">
                    </el-input-number>
                </el-form-item>
                <el-form-item label="卡密面值" prop="money">
                    <el-input-number :min="1" :precision="0" v-model="generateForm.money" controls-position="right" style="width: 100%" placeholder="请输入卡密面值">
                    </el-input-number>
                </el-form-item>
                <el-form-item label="卡密长度" prop="len">
                    <el-input-number :min="10" :max="30" :precision="0" v-model="generateForm.len" controls-position="right" style="width: 100%" placeholder="请输入卡密长度"></el-input-number>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button @click="dialogGenerateFormVisible = false" size="medium">取 消</el-button>
                <el-button type="primary" :loading="generateLoading" @click="onCodeCreate" size="medium">确 定</el-button>
            </div>
        </el-dialog>

        <el-dialog title="卡密导出" width="25%" :visible.sync="dialogExportFormVisible">
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
                    code: '',
                },
            },

            dialogGenerateFormVisible: false,
            generateLoading: false,
            generateForm: {
                count: undefined,
                money: undefined,
                len: 20,
            },
            generateFormRules: {
                count: [{
                    required: true,
                    message: '请输入生成数量',
                    trigger: 'blur'
                }],
                money: [{
                    required: true,
                    message: '请输入卡密面值',
                    trigger: 'blur'
                }],
                len: [{
                    required: true,
                    message: '请输入卡密长度',
                    trigger: 'blur'
                }],
            },

            dialogExportFormVisible: false,
            exportLoading: false,
            exportForm: {
                status: -1,
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
                axios.get('/wp-json/ceo-shop/v1/coupon-code/index', {
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
                    '/wp-json/ceo-shop/v1/coupon-code/create',
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
                let url = '/wp-json/ceo-shop/v1/coupon-code/export?status=' + this.exportForm.status
                link.href = url;
                link.setAttribute('download', '卡密导出.csv');
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
            handleDelete(id) {
                this.loading = true
                let _this = this
                axios.post('/wp-json/ceo-shop/v1/coupon-code/delete', {
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
                axios.post('/wp-json/ceo-shop/v1/coupon-code/delete', {
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
