<template>
       <va-inner-loading :loading="busy">

        <va-card>
            <va-card-title>CreateUser</va-card-title>
            <va-card-content>
                <div class="row">
                    <div class="flex md6">
                        <va-input label="Name" v-model="name"></va-input>
                    </div>
                    <div class="flex md6">
                        <va-input label="Email" v-model="email"></va-input>
                    </div>
                    <div class="flex md6 mt-2">
                        <va-input label="Password" v-model="password"></va-input>
                    </div>
                    <div class="flex md6 mt-2">
                        <va-input label="Age" type="number" v-model="profile.age"></va-input>
                    </div>
                    <div class="flex md12 mt-2">
                        <va-input label="Birth Date" type="date" v-model="profile.birth_date"></va-input>
                    </div>
                    <div class="flex md12 mt-2">
                        <div class="center">
                            <va-file-upload v-model="image" type="single"></va-file-upload>
                        </div>

            
                    </div>
                    <div class="flex md12">
                        <div class="center">
                            <va-button @click="save">Save</va-button>
                        </div>
                    </div>

                </div>
            </va-card-content>
            </va-card>
            </va-inner-loading>
</template>

<script setup>
    import {ref,reactive} from 'vue';

const busy = ref(false);
const email = ref('');
const name = ref('saiful');
const password = ref('');
const profile = reactive({
    age:0,
    birth_date:''
});



const image = ref({});

const save = async ()=>{

    busy.value = true;
    try {
        const url = route('api.user.store');
        
        const f = new FormData();
        f.append('email',email.value);
        f.append('name',name.value);
        if(image.value instanceof File){
            f.append('image',image.value)
        }
        f.append('password',password.value);
        f.append('profile[age]',profile.age);
        f.append('profile[birth_date]',profile.birth_date);
        const {data} = await axios.post('/users',f);

    } catch (error) {
        console.error(error)
    }
    busy.value = false;
}




</script>

<style lang="scss" scoped>

</style>