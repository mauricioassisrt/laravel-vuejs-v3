<template>
    <h5> <span class="badge bg-success">Listando Companias</span></h5>
    <div class="text-end">
        <router-link :to="{name: 'companies.create'}" class="btn btn-sm btn-primary">Novo</router-link>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Página Web</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="item in companies" :key="item.id">
                <tr>
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.name }}</td>
                    <td>{{ item.email }}</td>
                    <td>{{ item.address }}</td>
                    <td>
                        <button type="button" @click="deleteCompany(item.id)" class="btn btn-sm btn-danger">Deletar</button>
                    </td>
                </tr>
            </template>
        </tbody>
</table>
</template>


<script>

import { onMounted } from "vue"
import useCompanies from '../../composable/companies'

    export default {
        setup(){
            const { companies, getCompanies, destroyCompanies} = useCompanies()
            onMounted(getCompanies)
            const deleteCompany = async (id)=>{
                if(!window.confirm("Tem certeza que deseja excluir?")){
                    return
                }
                await destroyCompanies(id)
                await getCompanies()
            }
            return {
                companies,
                deleteCompany
            }
        }
    }
</script>
