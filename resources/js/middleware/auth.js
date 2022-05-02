export default function ({next, store}) {
  if(!store.getters.auth.loggedIn || !store.getters.auth.token) {
    return next({
      name: 'login'
    })
  }
  return next()
}