export async function getBookIndexData() {
    const { data: response } = await axios.get('api/book/index/data')

    return response.data
}

export async function getAuthorsIndexData() {
    const { data: response } = await axios.get('api/author/index/data')

    return response.data
}
