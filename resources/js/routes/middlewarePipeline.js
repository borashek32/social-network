function middlewarePipeline(context, middleware, index) {
  const middleware = middleware[index]
  if(!nextMiddleware) {
    return context.next
  }
  return () => {
    const nextMiddleware = middlewarePipeline(
      context, middleware, index + 1
    )
    nextMiddleware({...context, next: nextPipeline})
  }
}
export default middlewarePipeline