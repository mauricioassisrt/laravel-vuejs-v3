import axios from 'axios';
import { ref } from 'vue'
import { useRouter } from 'vue-router';
export default function useCompanies() {
    const errors = ref('')
    const router = useRouter()
    const companies = ref([]);

    const getCompanies = async() => {
        let response = await axios.get('/api/companies')
        companies.value = response.data.data
    }

    const storeCompany = async(data) => {
        errors.value = ''
        try {
            await axios.post('/api/companies', data)
            await router.push({ name: 'companies.index' })
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroyCompanies = async(id) => {
        await axios.delete('api/companies/' + id)
    }
    return {
        companies,
        getCompanies,
        destroyCompanies,
        storeCompany,
    }
}