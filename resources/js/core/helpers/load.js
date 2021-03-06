export default (self, value) => {
    self.$store.dispatch('buscando', value)
}