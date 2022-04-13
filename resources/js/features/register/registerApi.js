
export async function registerApi(data) {
    return await axios.post('api/register', data)
        .catch((e) => {
            if (e.response.data)
                throw e.response.data.errors[Object.keys(e.response.data.errors)[0]][0]
        })
}
