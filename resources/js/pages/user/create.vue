<template>
    <va-inner-loading :loading="busy">
        <va-card>
            <va-card-title>CreateUser</va-card-title>
            <va-card-content>
                <div class="row">
                    <div class="flex md12">
                        <va-input label="Name" v-model="name"></va-input>
                    </div>
                    <div class="flex md12 mt-2">
                        <va-input label="Email" v-model="email" :rules="emailRule"></va-input>
                    </div>

                    <div class="flex md12 mt-2">
                        <va-input label="Password" v-model="password"></va-input>
                    </div>

                    <div class="flex md12 mt-2">
                        <va-input label="Age" type="number" v-model="profile.age"></va-input>
                    </div>
                    <div class="flex md12 mt-2">
                        <va-input label="Birth Date" type="date" v-model="profile.birth_date"></va-input>
                    </div>

                    <div class="flex md12 mt-2">
                        <div class="center">
                            <va-button @click="save">Save</va-button>
                        </div>
                    </div>
                </div>
            </va-card-content>
        </va-card>

    </va-inner-loading>
</template>

<script>
import axios from 'axios';
import { defineComponent, ref, reactive } from 'vue';
export default defineComponent({

    setup(props, context) {
        context.emit('x','aksks')
        const busy = ref(false);
        const name = ref('');
        const email = ref('');
        const password = ref('');
        const profile = reactive({
            age: null,
            birth_date: null
        })


        const emailRule = [(value) => (value ? true : false) || 'Email Are Required'];


        const save = async () => {
            try {
                const params = {
                    email: email.value,
                    name: name.value,
                    password:password.value,
                    profile
                }
                const { data } = await axios.post('/sk', params)
            } catch (error) {
                console.log(error)
            }
        }

        return {
            busy,
            name,
            email,
            password,
            profile,
            emailRule,
            save
        }

    }


});
</script>

<style lang="scss" scoped>

</style>