export async function searchApiAuthors(data) {
    return await axios.post('/api/authors/search', data)
        .catch((e) => {
            throw e.response.data
        })
}

export async function searchApiBooks(data) {
    return await axios.post('/api/books/search', data)
        .catch((e) => {
            throw e.response.data
        })
}
