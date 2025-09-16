<template>
    <b-container class="mt-5">
        <b-row align-h="center">
            <b-col cols="12" md="6" lg="4">
                <b-card title="Iniciar Sesión">
                    <b-form @submit.prevent="login">
                        <b-form-group label="Usuario:" label-for="user">
                            <b-form-input
                                id="user"
                                v-model="userName"
                                type="text"
                                placeholder="Nombre del USUARIO"
                                required
                            ></b-form-input>
                        </b-form-group>

                        <b-form-group label="Contraseña:" label-for="password">
                            <b-form-input
                            id="password"
                            v-model="password"
                            type="password"
                            placeholder ="Contraseña"
                            required
                            ></b-form-input>
                        </b-form-group>

                        <b-alert
                            v-model="error"
                            variant="danger"
                            class="mt-3"
                            dismissible
                            @dismissed="!error"
                        >
                            {{ msgError }}
                        </b-alert>
                        <b-button type="submit" variant="primary" block>Entrar</b-button>
                    </b-form>
                </b-card>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {
    name: 'AppLogin',
    data() {
        return {
            userName: '',
            password: '',
            error: false,
            msgError: '',
            basePath: 'http://localhost:9000/public/'
        };
    },
    methods: {
        async login(){
            try {
                //!console.log('Attempting to log in with:', this.userName);
                this.error = null;
                
                const response = await this.$axios.post(this.basePath + 'auth.php', {
                    user: this.userName,
                    password: this.password
                }, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                if (response.data.success) {
                    localStorage.setItem('usuario', JSON.stringify(response.data.usuario));
                    
                    this.$router.push('/home');
                } else {
                    this.error = true;
                    this.msgError = response.data.message || 'Usuario o contraseña incorrectos';
                }
            } catch (error) {
                this.error = true;
                this.msgError = error.response?.data?.message || 'Error al iniciar sesión';
                console.error(error);
            }
        }
    },

    mounted() {
        // console.log('Login component mounted');        
    }
}
</script>