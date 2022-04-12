export async function getAuthorData(id) {
    const { data: response } = await axios.get('/api/authors/' + id)

    return response.data
}
