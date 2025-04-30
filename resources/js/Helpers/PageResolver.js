export default function resolvePageComponent(name, appPages, layout) {
    // Import pages from the core application folder since it's not a module
    let pages = appPages

    // Sort and replace the dot with the correct slash
    const path = Object.keys(pages)
        .sort((a, b) => a.length - b.length)
        .find(path => path.endsWith(`${ name.replaceAll('.', '/') }.vue`))

    // Throw an error if the page is not found
    if (!path) {
        throw new Error(`Page not found: ${ name }`)
    }

    let page = pages[path]

    if (page.default.layout === undefined) {
        page.default.layout = layout
    }

    // Return the page
    return typeof pages[path] === 'function' ? pages[path]() : pages[path]
}
