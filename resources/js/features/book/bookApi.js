
export async function getBookData(id) {
    const { data: response } = await axios.get('/api/books/' + id)

    return response.data
}

export async function getFile(filename) {
    return await axios.get('/api/download/' + filename)
        .catch((e) => {
            throw e.response.data
        })
}