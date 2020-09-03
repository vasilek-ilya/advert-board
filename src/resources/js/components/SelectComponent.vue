<template>
    <div class="input-field col s12">
        <select ref="select">
            <option value="" disabled selected>Choose your option</option>
            <option v-for="item in list" value="1">{{ item }}</option>
        </select>
        <label>{{ title }}</label>
    </div>
</template>

<script>
    export default {
        name: "SelectComponent",
        mounted() {
            M.FormSelect.init(this.$refs.select, {

            })
            console.log(this.props);
        },
        props: ['list', 'title'],
    }
</script>

<style scoped>

</style>
