export async function contactApi(data) {
        return await axios.post('/api/contact/post', data)
                .catch((e) => {
                        throw e.response.data
                })
}
