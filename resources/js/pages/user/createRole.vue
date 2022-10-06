<template>
   
    <va-modal v-model="model" hide-default-actions size="medium" title="Create Role">
        <va-form class="row" style="min-width:400px">
                    <div class="flex md12">
                        <va-input v-model="role" label="Role Name"></va-input>
                    </div>
                    <div class="flex md12 mt-3">
                     <div class="actions">
                        <va-button color="danger" @click="model = false">Cancel</va-button>
                      <va-button @click="save">Save</va-button>
                     </div>
                    </div>
                </va-form>
           
    </va-modal>
  </template>
  
  <script setup>
    import axios from 'axios';
import {defineProps,defineEmits,computed, ref} from 'vue';
    const props = defineProps({
        show:{
            type:Boolean,
            default: false
        }
    })
    const emit = defineEmits(['change','done']);

    const model = computed( {
            get(){
                return props.show;
            },
            set(val){
                console.log(val)
                emit('change',val)
            }
        })

    const role = ref('');


    const save = async() => {
        try {
            const url = route('api.userRole.store');
         const {data} = await   axios.post(url,{role:role.value})
         
         emit('done',data);

        } catch (error) {
            console.error(error)
        }
    }



  </script>
  

<script setup>

</script>

<style lang="scss" scoped>
    .actions{
        display: flex;
        justify-content: flex-end;
    }

</style>