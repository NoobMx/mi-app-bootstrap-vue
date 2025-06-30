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

                        <b-button type="submit" variant="primary" block>Entrar</b-button>
                    </b-form>

                <!-- <b-alert
                    v-if="error"
                    variant="danger"
                    dismissible
                    class="mt-3"
                >{{ error }}</b-alert> -->
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
            error: null
        };
    },
    methods: {
        handleLogin() {
            console.log(this.userName, this.password);
            
            if (this.userName === 'admin' && this.password === '123') {
                localStorage.setItem('auth', true);
                this.$router.push('/home');
            } else {
                alert('Credenciales incorrectas');
            }
        },

        async login(){
            try {
                console.log('Attempting to log in with:', this.user);
                
                const response = await this.$axios.get('http://localhost:8000/models/login.php', {
                    user: this.userName,
                    password: this.password
                });

                if (response.data.success) {
                    localStorage.setItem('auth', true);
                    this.$router.push('/home');
                } else {
                    this.error = 'Credenciales incorrectas';
                }
            } catch (error) {
                console.error(error);
            }
        }
        

    },

    mounted() {
        console.log('Login component mounted');
        
    }
}
</script>