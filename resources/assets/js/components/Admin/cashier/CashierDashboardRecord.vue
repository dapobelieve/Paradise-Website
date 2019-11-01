<template>
    <tr style="cursor:pointer;"  class="gradeC ">
            <td>{{ index + 1 }}</td>
            <td>@{{record.user.name}}</td>
            <td>{{ record.name }}</td>
            <td>{{ record.service }}</td>
            <td>{{ record.ref }}</td>
            <td>
                &#8358;{{ record.price }}
            </td>
            <td>
                <div class="label label-info">{{ record.status}}</div>
            </td>
        <td><div class="label label-default">{{ record.created_at }}</div></td>
            <td><button @click="approve" class="btn btn-success btn-sm">Approve</button></td>
        </tr>
</template>

<script>
    export default {
        name: "CashierDashboardRecord",
        props: ['record', 'index'],
        data () {
            return {

            }
        },
        methods: {
            approve () {
                axios.post(``)
            }
        }
    }
</script>

<style scoped>

</style>