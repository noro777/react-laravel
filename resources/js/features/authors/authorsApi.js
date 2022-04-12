export async function getAuthorsData() {
    const { data: response } = await axios.get('/api/authors')

    return response.data
}
