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
                        <va-select label="Role" type="date" v-model="role" :options="props.roles"></va-select>
                    </div>

                    <div class="flex md12 mt-2">
                        <va-input label="Age" type="number" v-model="profile.age"></va-input>
                    </div>
                    <div class="flex md12 mt-2">
                        <va-input label="Birth Date" type="date" v-model="profile.birth_date"></va-input>
                    </div>

                    

                    <div class="flex md12 mt-2">
                       <div class="center">
                        <va-file-upload v-model="image" type="single"   file-types="jpg,png" />
                       </div>
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

    props:{
        roles:{
            type:Array,
            required:true
        }
    },

    setup(props, context) {
        
        const busy = ref(false);
        const name = ref('saiful');
        const email = ref('saiful@gmail.com');
        const password = ref('1234585');
        const image = ref({})
        const role = ref('');
        const profile = reactive({
            age:'',
            birth_date:''
        })


        const emailRule = [(value) => (value ? true : false) || 'Email Are Required'];


       


        const save = async () => {
            busy.value = true;
            try {
                const f = new FormData
                f.append('email',email.value);
                f.append('name',name.value);
                f.append('role',role.value)
                if(image.value instanceof File){
                    f.append('image',image.value)
                }
              
                f.append('password',password.value);
                
                f.append(`profile[age]`,profile.age);
                f.append(`profile[birth_date]`,profile.birth_date);
                
                const url = route('api.user.store')
                const { data } = await axios.post(url, f)
                console.log(data)
            } catch (error) {
                console.log(error)
            }
            busy.value = false;
        }

        return {
            props,
            busy,
            name,
            email,
            password,
            image,
            profile,
            role,
            emailRule,
            save
        }

    }


});
</script>

<style lang="scss" scoped>

</style>