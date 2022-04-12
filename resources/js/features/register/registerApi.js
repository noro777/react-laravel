
export async function registerApi(data) {
    await axios.post('api/register', data)

        .then((res) => res.data)

        .catch((e) => {
            if (e.response.data.errors.email)
                throw new Error(e.response.data.errors.email)
        })
}
