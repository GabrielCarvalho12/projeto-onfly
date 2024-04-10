import useApi from 'src/composables/UseApi'

export default function usersService () {
  const { list, post, update, remove, getById, token } = useApi('users')

  return {
    list,
    post,
    update,
    remove,
    getById,
    token
  }
}
