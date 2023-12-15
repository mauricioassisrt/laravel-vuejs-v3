<template>
    <h5> <span class="badge bg-success">Criar Companias</span></h5>

    <form @submit.prevent="saveCompany">

        <div class="form-group">
            <label>Nome da Compania</label>
            <input v-model="form.name" type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input  v-model="form.email" type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Endereço</label>
            <input  v-model="form.address" type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
            <label>web site</label>
            <input type="text" v-model="form.website" name="website" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
        </div>
    </form>
</template>


<script>
import { reactive } from 'vue'
import useCompanies from '../../composable/companies'
    export default {
        setup(){
            const {errors, storeCompany} = useCompanies()
            const form = reactive({
                'name': '',
                'email':'',
                'address': '',
                'website':''

            })
            const saveCompany = async()=>{
                await storeCompany({...form})
            }
            return {
                form,
                saveCompany
            }
        }
    }
</script>
