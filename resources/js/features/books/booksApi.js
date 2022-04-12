export async function getBooksData() {
    const { data: response } = await axios.get('/api/books')

    return response.data
}
