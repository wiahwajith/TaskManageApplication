const Ziggy = {"url":"http:\/\/taskmanage.test","port":null,"defaults":{},"routes":{"register.show":{"uri":"register","methods":["GET","HEAD"]},"register.perform":{"uri":"register","methods":["POST"]},"login.show":{"uri":"login","methods":["GET","HEAD"]},"login.perform":{"uri":"login","methods":["POST"]},"logout.perform":{"uri":"logout","methods":["GET","HEAD"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
