export async function postCommentData(data) {
    return await axios.post('/api/comments', data)
        .catch((e) => {
            throw e.response.data
        })
}
