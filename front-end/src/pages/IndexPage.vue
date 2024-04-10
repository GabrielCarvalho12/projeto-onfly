<template>
  <q-page padding>
    <q-table
      title="Usuários"
      :rows="users"
      :columns="columns"
      row-key="name"
    >
      <template v-slot:top>
        <span class="text-h5">Usuários</span>
        <q-space/>
        <q-btn color="primary" label="Novo" :to="{name: 'formUser'}" />
      </template>
      <template v-slot:body-cell-actions="props">
        <q-td :props="props" class="q-gutter-sm">
          <q-btn icon ="edit" color="info" dense size="sm" @click="handleEditUser(props.row.id)"/>
          <q-btn icon ="delete" color="negative" dense size="sm" @click="handleDeleteUser(props.row.id)"/>
        </q-td>
      </template>
    </q-table>
  </q-page>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue'
import usersService from 'src/services/users'
import { useQuasar } from 'quasar'
import { useRouter } from 'vue-router'

export default defineComponent({
  name: 'IndexPage',
  setup () {
    const users = ref([])
    const { list, remove } = usersService()
    const columns = [

      { name: 'id', field: 'id', label: 'Id', sortable: true, align: 'left' },
      { name: 'name', field: 'name', label: 'Nome', sortable: true, align: 'left' },
      { name: 'email', field: 'email', label: 'E-mail', sortable: true, align: 'left' },
      { name: 'actions', field: 'actions', label: 'Ações', align: 'right' }

    ]
    const $q = useQuasar()
    const router = useRouter()

    onMounted(() => {
      getUsers()
    })

    const getUsers = async () => {
      try {
        const data = await list()
        users.value = data
      } catch (error) {
        throw new Error(error)
      }
    }

    const handleEditUser = async (id) => {
      router.push({ name: 'formUser', params: { id } })
    }

    const handleDeleteUser = async (id) => {
      try {
        $q.dialog({
          title: 'Deletar',
          message: 'Deseja deletar esse usuário ?',
          cancel: true,
          persistent: true
        }).onOk(async () => {
          await remove(id)
          $q.notify({ message: 'Usuário deletado com sucesso!', icon: 'check', color: 'positive' })
          await getUsers()
        })
      } catch (error) {
        $q.notify({ message: 'Erro ao deletar usuário.', icon: 'times', color: 'negative' })
      }
    }

    return {
      users,
      columns,
      handleDeleteUser,
      handleEditUser
    }
  }
})
</script>
