
export async function loginApi(data) {
    return await axios.post('api/login', data)
        .catch((e) => {
            throw e.response.data
        })
}
