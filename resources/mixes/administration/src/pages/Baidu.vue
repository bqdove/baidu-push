<script>
    import injection from '../helpers/injection';

    export default {
        beforeRouteEnter(to, from, next) {
            injection.http.post(`${window.api}/baidu/get`).then(response => {
                const data = response.data.data;
                next(vm => {
                    vm.form.enabled = data.enabled === '1';
                    vm.form.token = data.token;
                    injection.sidebar.active('setting');
                });
            });
        },
        data() {
            return {
                form: {
                    enabled: true,
                    token: '',
                },
                loading: false,
                rules: {
                    token: [
                        {
                            required: true,
                            type: 'string',
                            message: 'Token不能为空',
                            trigger: 'change',
                        },
                    ],
                },
            };
        },
        methods: {
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.form.validate(valid => {
                    if (valid) {
                        self.$http.post(`${window.api}/baidu/set`, self.form).then(() => {
                            self.$notice.open({
                                title: '更新百度搜索推送设置成功！',
                            });
                        }).finally(() => {
                            self.loading = false;
                        });
                    } else {
                        self.loading = false;
                        self.$notice.error({
                            title: '请正确填写设置信息！',
                        });
                    }
                });
            },
        },
    };
</script>
<template>
    <card>
        <p slot="title">全局设置</p>
        <i-form :label-width="200" :model="form" ref="form" :rules="rules">
            <row>
                <i-col span="14">
                    <form-item label="站点开启">
                        <i-switch v-model="form.enabled" size="large">
                            <span slot="open">开启</span>
                            <span slot="close">关闭</span>
                        </i-switch>
                    </form-item>
                </i-col>
            </row>
            <row>
                <i-col span="14">
                    <form-item label="Token" prop="token">
                        <i-input placeholder="请输入Token" v-model="form.token"></i-input>
                    </form-item>
                </i-col>
            </row>
            <row>
                <i-col span="14">
                    <form-item>
                        <i-button :loading="loading" type="primary" @click.native="submit">
                            <span v-if="!loading">确认提交</span>
                            <span v-else>正在提交…</span>
                        </i-button>
                    </form-item>
                </i-col>
            </row>
        </i-form>
    </card>
</template>
