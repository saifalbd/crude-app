
    <template>
        <div class="page">
            <va-form
    style="width: 300px;"
    tag="form"

  >
  <div class="row">
    <div class="flex sm12 mt-2">
        <va-input
      label="Name"
      v-model="name"
    
    />
    </div>


    <div class="flex sm12 mt-2">
        <va-input
      label="Email"
      v-model="email"
      :rules="rules.email"
    />
    </div>

    <div class="flex sm12 mt2">
        <va-input
      label="Password"
      v-model="password"
    />
    </div>

  </div>
   


    

    <va-button  class="mt-3">
      Login
    </va-button>
  </va-form>
        </div>
</template>


<script>
    export default {

        data(){
            return {
                name:'',
                email:'',
                password:'',
                rules:{
                    email:[(val)=>val || 'Email are Required']
                }
            }
        }
        
    }
</script>

<style lang="scss" scoped>

</style>