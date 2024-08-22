<?php ceo_shop_echo_admin_loading() ?>
<div class="wrap">
    <div id="ceo-app">
        <h1 class="wp-heading-inline">数据清理</h1>
        <hr class="wp-header-end" style="margin-bottom: 8px">
        <el-tabs v-model="activeTab" @tab-click="handleTabClick">
            <el-tab-pane v-for="tab in tabArr" :key="tab.key" :label="tab.name" :name="tab.key">
                <el-row class="clean-row">
                    <el-col>
                        <el-card>
                            <el-row>
                                <el-col :span="4" :offset="2">
                                    <div>
                                        <el-statistic :title="'未支付' + tab.name + '（一月前）'">
                                            <template slot="formatter">
                                                <div class="clean-num-wrap">
                                                    <el-progress type="circle" :percentage="board[0][2]" :color="colors"></el-progress>
                                                    <div class="clean-num">{{ board[0][0] }}/{{ board[0][1] }}条</div>
                                                </div>
                                            </template>
                                        </el-statistic>
                                        <div class="clean-btn">
                                            <el-button @click="handlerCleanClick(tab.key, 1)" type="primary" icon="el-icon-refresh" size="small">清理</el-button>
                                        </div>
                                    </div>
                                </el-col>
                                <el-col :span="4">
                                    <div>
                                        <el-statistic :title="'未支付' + tab.name + '（三月前）'">
                                            <template slot="formatter">
                                                <div class="clean-num-wrap">
                                                    <el-progress type="circle" :percentage="board[1][2]" :color="colors"></el-progress>
                                                    <div class="clean-num">{{ board[1][0] }}/{{ board[1][1] }}条</div>
                                                </div>
                                            </template>
                                        </el-statistic>
                                        <div class="clean-btn">
                                            <el-button @click="handlerCleanClick(tab.key, 2)" type="primary" icon="el-icon-refresh" size="small">清理</el-button>
                                        </div>
                                    </div>
                                </el-col>
                                <el-col :span="4">
                                    <div>
                                        <el-statistic :title="'未支付' + tab.name + '（半年前）'">
                                            <template slot="formatter">
                                                <div class="clean-num-wrap">
                                                    <el-progress type="circle" :percentage="board[2][2]" :color="colors"></el-progress>
                                                    <div class="clean-num">{{ board[2][0] }}/{{ board[2][1] }}条</div>
                                                </div>
                                            </template>
                                        </el-statistic>
                                        <div class="clean-btn">
                                            <el-button @click="handlerCleanClick(tab.key, 3)" type="primary" icon="el-icon-refresh" size="small">清理</el-button>
                                        </div>
                                    </div>
                                </el-col>
                                <el-col :span="4">
                                    <div>
                                        <el-statistic :title="'未支付' + tab.name + '（一年前）'">
                                            <template slot="formatter">
                                                <div class="clean-num-wrap">
                                                    <el-progress type="circle" :percentage="board[3][2]" :color="colors"></el-progress>
                                                    <div class="clean-num">{{ board[3][0] }}/{{ board[3][1] }}条</div>
                                                </div>
                                            </template>
                                        </el-statistic>
                                        <div class="clean-btn">
                                            <el-button @click="handlerCleanClick(tab.key, 4)" type="primary" icon="el-icon-refresh" size="small">清理</el-button>
                                        </div>

                                    </div>
                                </el-col>
                                <el-col :span="4">
                                    <div>
                                        <el-statistic :title="'未支付' + tab.name + '（全部）'">
                                            <template slot="formatter">
                                                <div class="clean-num-wrap">
                                                    <el-progress type="circle" :percentage="board[4][2]" :color="colors"></el-progress>
                                                    <div class="clean-num">{{ board[4][0] }}/{{ board[4][1] }}条</div>
                                                </div>
                                            </template>
                                        </el-statistic>
                                        <div class="clean-btn">
                                            <el-button @click="handlerCleanClick(tab.key, 5)" type="primary" icon="el-icon-refresh" size="small">清理</el-button>
                                        </div>
                                    </div>
                                </el-col>
                            </el-row>
                            <div>
                            </div>
                        </el-card>
                    </el-col>
                </el-row>
                <el-row>
                    <el-col>
                        <el-card>
                            <div class="block">
                                <el-timeline v-if="logs.length > 0">
                                    <el-timeline-item v-for="log in logs" :key="log.id" :timestamp="log.created_time" placement="top">
                                        <el-card>
                                            <h4 v->清理 {{ opArr[log.op - 1] }} 未支付{{ tab.name }} </h4>
                                            <p>{{ log.display_name }} 提交于 {{ log.created_time }}</p>
                                        </el-card>
                                    </el-timeline-item>
                                </el-timeline>
                                <el-empty v-else description="暂无数据"></el-empty>
                            </div>
                        </el-card>
                    </el-col>
                </el-row>
            </el-tab-pane>
        </el-tabs>
    </div>
</div>

<script>
    new Vue({
        el: '#ceo-app',
        data: {
            activeTab: 'order',
            tabArr: [{
                    key: 'order',
                    name: '充值记录',
                },
                {
                    key: 'vip',
                    name: '会员记录',
                },
                {
                    key: 'purchase',
                    name: '购买记录',
                },
                {
                    key: 'trading',
                    name: '交易记录',
                },
            ],
            opArr: [
                '一月前',
                '三月前',
                '半年前',
                '一年前',
                '全部',
            ],
            colors: [{
                    color: '#00ff00',
                    percentage: 20
                },
                {
                    color: '#b4ff00',
                    percentage: 40
                },
                {
                    color: '#ffd500',
                    percentage: 60
                },
                {
                    color: '#ff5f00',
                    percentage: 80
                },
                {
                    color: '#ff0000',
                    percentage: 100
                }
            ],
            loading: false,
            board: [],
            logs: [],
            total: 0,
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
                axios.get('/wp-json/ceo-shop/v1/data-clean/index', {
                        params: {
                            type: this.activeTab,
                        }
                    })
                    .then(function(res) {
                        _this.logs = res.data.data.logs
                        _this.board = res.data.data.board
                        _this.total = res.data.pagination.total
                    })
                    .catch(function(err) {
                        console.log(err);
                    })
                    .then(function() {
                        _this.loading = false
                    });
            },
            handleTabClick(tab, event) {
                this.load()
            },
            handlerCleanClick(type, op) {
                this.loading = true
                let _this = this
                this.$confirm('此操作将永久删除部分未支付数据表记录, 是否继续?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning',
                }).then(() => {
                    axios.get('/wp-json/ceo-shop/v1/data-clean/clean', {
                            params: {
                                type: type,
                                op: op,
                                _wpnonce: '<?php echo wp_create_nonce('wp_rest') ?>',
                            }
                        })
                        .then(function(res) {
                            if (res.data.success) {
                                _this.$message({
                                    message: res.data.msg,
                                    type: 'success',
                                    offset: 60,
                                });
                                _this.loading = false
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
                }).catch(() => {});
            }
        }
    })
</script>

<style scoped>
    .clean-row {
        margin-bottom: 20px;
    }

    .clean-title {
        font-size: 16px;
        font-weight: 600;
    }

    .clean-btn {
        text-align: center;
        margin-top: 30px;
    }

    .clean-num-wrap {
        min-width: 150px;
        margin-top: 10px;
    }

    .clean-num {
        margin-top: 10px;
    }
</style>
