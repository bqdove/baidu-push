<script>
    import injection from '../helpers/injection';

    export default {
        beforeRouteEnter(to, from, next) {
            injection.http.post(`${window.api}/baidu/get`).then(response => {
                const data = response.data.data;
                next(vm => {
                    vm.enabled = data.enabled;
                    vm.token = data.token;
                    injection.sidebar.active('setting');
                });
            });
        },
        data() {
            return {
                enabled: true,
                token: '',
            };
        },
        methods: {
            submit() {
                const self = this;
                self.$validator.validateAll();
                if (self.errors.any()) {
                    return false;
                }
                self.$jquery('button.btn-submit').prop('disabled', true);
                self.$jquery('button.btn-submit').text('提交中...');
                self.$http.post(`${window.api}/baidu/configuration`, {
                    enabled: self.enabled,
                    token: self.token,
                }).then(response => {
                    self.$store.commit('setting', response.body.data);
                    self.$store.commit('message', {
                        show: true,
                        type: 'notice',
                        text: '更新百度搜索推送设置成功！',
                    });
                    self.$jquery('button.btn-submit').prop('disabled', false);
                    self.$jquery('button.btn-submit').text('保存');
                }, response => {
                    console.log(response.body);
                    self.$jquery('button.btn-submit').prop('disabled', false);
                    self.$jquery('button.btn-submit').text('保存');
                });
                return true;
            },
            sync() {
            },
        },
    };
</script>
<style></style>
<template>
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">百度搜索</h3>
        </div>
        <div class="box-body">
            <div class="form-horizontal" @keyup.enter="submit">
                <div class="form-group">
                    <label class="col-sm-1 control-label">开启主动推送功能</label>
                    <div class="col-sm-3">
                        <div class="btn-group btn-switch">
                            <label class="btn btn-primary" :class="{ 'active': enabled === '1' }">
                                <input type="radio" value="1" v-model="enabled"> 开启
                            </label>
                            <label class="btn btn-primary" :class="{ 'active': enabled === '0' }">
                                <input type="radio" value="0" v-model="enabled"> 关闭
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">Token</label>
                    <div class="col-sm-3">
                        <input name="token" type="text" class="form-control" placeholder="请输入Token" v-model="token"
                               v-validate data-vv-rules="required">
                    </div>
                    <div class="col-sm-8">
                        <span class="help-block">百度提供的授权token</span>
                        <span class="help-block">Token不能为空</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-primary btn-submit" @click="submit">保存</button>
        </div>
    </div>
</template>
