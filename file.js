 /*

Necesito un programador para hacer una aplicación en React de chat básico entre usuarios.
El código HTML está listo, así como también el backend con respectivas devoluciones en formato json

Los paquetes recomendados a usar (se pueden discutir):
react-router-dom
react-infinite-scroller

No utilizar:
JQuery
Redux (en lo posible)

Especifico debajo las llamadas ajax, para más información con objs json de envío y recibida, ver el archivo .js adjunto

- getMoreConversations : Llamada para devolver 10 convs, cuando se scrollea hacia abajo el listado.
- getMessagesFrom : Llamada para recibir 10 msjs de una conv en específico, cuando se abre o cuando se scrollea hacia arriba.
- sendMessageTo : Llamada para enviar msje en una conv abierta.
- checkForUpdates : NO se integra con notificaciones push, se usa esta llamada con intervalos para actualizar (3 min, 5, 10, 15...)
- markConvs : Si una conversación es marcada/desmarcada como importante, bloqueada o spam.
- searchConvs : Buscar conversaciones con username/name similares al termino de búsqueda escrito.

Uso nombres de funciones en inglés por convención, pero la app está en español, si es posible utilizar paquete de internalización.

Si conocés lo básico de Laravel, puedo pasarte la clase del controlador ajax y la view del inbox para realizar las pruebas.

 */
 
 [
    // getMoreConversations : take 10 convs from the database

        // DATA SENT
        {
            action : 1,
            newestLastMsg : 0, // taken from the conversation with the newest last_message_id
            oldestLastMsg : 0, // taken from the conversation with the oldest last_message_id
            // last_message_id is returned by all conversations, regardless the stack of msgs were loaded or not
            username : "foo-username", // or null, if there is not any convs open
            newestMsg : 0, // or null, id taken from the newest messages of the conversation with this user (mine or not, indistinct)
            oldestMsg : 0, // or null, id taken from the oldest messages of the conversation with this user (mine or not, indistinct)
            filter : 0, // filter of conversations (it should save conversations id in different filter arrays, and use newestLastMsg or oldestLastMsg from this)
        }
        , // DATA RECEIVED
        {
            success : true,
            action : 1,
            convs : [ // conversations array (max:10) or null
                {
                    username : "foo-username", // key
                    user : {
                        name : "Mike Spencer",
                        avatarImg : "https://domain.com/avatar/avartarname.jpg"
                    },
                    last_message_id : 1234, // this must be used for ORDER (DESC) all the conversation each time are taken new ones or updated
                    latestMessage : {
                        body : "This is a message from other user.",
                        me : false, // false if it is from the other
                        cr : 1606667923 // created_at timestamp
                    },
                    last_message_readed_id : 1233, // if(last_message_id!=last_message_readed_id) => mark convs as unread
                    star : true // Conversation marked as important
                },
                {
                    username : "bar-username",
                    user : {
                        name : "Mike Spencer2",
                        avatarImg : "https://domain.com/avatar/avartarname2.jpg"
                    },
                    last_message_id : 123,
                    latestMessage : {
                        body : "This is a message from me.",
                        me : true,
                        cr : 1606667923
                    },
                    last_message_readed_id : 12,
                    star : false
                }
            ],
            username : "foo-username", // or null if null was sent, make sure the client not changed the conversation
            msgs : [ /* see action = 2 for structure */ ], // if there are new msgs with this user
            warning : null,
        },
        // Warnings: "A"
        // Errors: 1, 2


    // getMessagesFrom : take 10 messages from username,
        // also returns conversation with new msgs from other users
       
        // DATA SENT
        {
            action : 2,
            username : "foo-username", // or null, if there is not any convs open
            newestMsg : 0, // id taken from the newest messages of the conversation with this user (mine or not, indistinct)
            oldestMsg : 0, // id taken from the oldest messages of the conversation with this user (mine or not, indistinct)
            newestLastMsg : 0, // taken from the conversation with the newest last_message_id
            oldestLastMsg : 0, // taken from the conversation with the oldest last_message_id
            filter : 0, // filter of conversations
            firstLoad : true, 
        }
        , // DATA RECEIVED
        {
            success : true,
            action : 2,
            username : "foo-username", // make sure the client not changed the conversation
            msgs : [ /* conversations array (max:10) or null */
                {
                    body : "This is a message from me.",
                    me : true,
                    cr : 1606667923  // created_at timestamp
                },
                {
                    body : "This is a message from the other.",
                    me : false,
                    cr : 1606667923  // created_at timestamp
                },
            ],
            convs : [ /* see action = 1 for structure */ ],
            // same as action=1, here the difference is that convers are only returned if they have new messages
            about_me : "This is an small abstract about the other user", // or null if sent firstLoad = false
            link : "https://domain.com/perfil/foo-username", // or null if sent firstLoad = false
            warning : null,
        },
        // Warnings: "A"
        // Errors: 1, 2


    // sendMessageTo : send the message to an specific convs, 
        // also returns new messages from this convs, and convs with new msgs from other users 
        // DATA SENT
        {
            action : 3,
            username : "foo-username",
            newestMsg : 0, // id taken from the newest messages of the conversation with this user (mine or not, indistinct)
            newestLastMsg : 0, // taken from the conversation with the newest last_message_id
            oldestLastMsg : 0, // taken from the conversation with the oldest last_message_id
            filter : 0, // filter of conversations
        }
        , // DATA RECEIVED
        {
            success : true,
            action : 3,
            username : "foo-username", // make sure the client not changed the conversation
            msgs : [ /* see action = 2 for structure */ ], // if there are new msgs with this user
            convs : [ /* see action = 1 for structure */ ], // if there are new convs with new msgs from other users
            warning : null,
        },
        // Warnings: "A", "B"
        // Errors: 1, 2


    // checkForUpdates : call periodically, returns convs with new msgs and if it is open a convs, new msgs from this
        // DATA SENT
        {
            action : 4,
            newestLastMsg : 0, // same as action = 1
            oldestLastMsg : 0, // same as action = 1
            filter : 0, // filter of conversations
            username : "foo-username", // or null, same as action = 1
            newestMsg : 0, // or null, same as action = 1
            oldestMsg : 0, // or null, same as action = 1
        }, // DATA RECEIVED
        {
            success : true,
            action : 4,
            username : "foo-username", // or null,
            msgs : [ /* see action = 2 for structure */ ], // only if there are new
            convs : [ /* see action = 1 for structure */ ], // only if there are new
            warning : null,
        },
        // Warnings: "A"
        // Errors: 1, 2


    // markConvs : mark a conversation with a star, block, or spam
        // DATA SENT
        {
            action : 5,
            mark : 0, // see bottom list
            username : "foo-username", // if there is an open conversation
            newestMsg : 0, // or null, same as action = 1
            oldestMsg : 0, // or null, same as action = 1
            newestLastMsg : 0, // taken from the conversation with the newest last_message_id
            oldestLastMsg : 0, // taken from the conversation with the oldest last_message_id
            filter : 0, // filter of conversations
        }
        , // DATA RECEIVED
        {
            success : true,
            action : 5,
            username : "foo-username", // or null if null was sent, make sure the client not changed the conversation
            msgs : [ /* see action = 2 for structure */ ], // if there are new msgs with this user
            convs : [ /* see action = 1 for structure */ ], // if there are new convs with new msgs from other users
            warning : null,
        },
        // Warnings: "A"
        // Errors: 1, 2



    // searchConvs : search a conversation by a param
        // DATA SENT
        {
            action : 6,
            term : "search term",
            username : "foo-username", // if there is an open conversation
            newestMsg : 0, // or null, same as action = 1
            oldestMsg : 0, // or null, same as action = 1
            newestLastMsg : 0, // taken from the conversation with the newest last_message_id
            oldestLastMsg : 0, // taken from the conversation with the oldest last_message_id
            filter : 0, // filter of conversations
        }
        , // DATA RECEIVED
        {
            success : true,
            action : 6,
            searchedConvs : [
                // same structure as convs, these should not be added to any normal convs stack, it could interfere with oldestLastMsg in new updates 
            ],
            username : "foo-username", // or null if null was sent, make sure the client not changed the conversation
            msgs : [ /* see action = 2 for structure */ ], // if there are new msgs with this user
            convs : [ /* see action = 1 for structure */ ], // if there are new convs with new msgs from other users
            warning : null,
        },
        // Warnings: "A"
        // Errors: 1, 2


    /**** DEPRECATED: USE markConvs ***
    blockSender and/or markAsSpam :
    // DATA SENT
    {
        action : 7,
        block : true, // false if is unblock
        blockUsername : "bar-username",
        username : "foo-username",
        spam : true,
        newestLastMsg : 0, // taken from the conversation with the newest last_message_id
        oldestLastMsg : 0, // taken from the conversation with the oldest last_message_id
        filter : 0, // filter of conversations
    }
    , // DATA RECEIVED
    {
        success : true,
        action : 7,
        blockUsername : "bar-username",
        username : "foo-username",
        convs : [  ], // if there are new convs with new msgs from other users
        warning : null,
    },
    // Warnings: "A", "C"
    // Errors: 1, 2
    ******* DEPRECATED ***/

    
]

/*

Indications:
- checkForUpdates should be call periodically after 3 minutes the first time and then after 5, then 10, 20, 30, and then every 60 minutes.
    This rutine must be restarted each time is executed any other action, or refresh page.
- intercept page refreshes, call checkForUpdates
- If last three msgs in last 48 hours are from me, not allow to send msg. Show msgs with time left. 
    Show msg also when writing 3rd msg and has other 2 in last 48 hours.
- Warning the user when is searching if it is using filters (are returned just convs with this filter)

URLs:
    /inbox 
    /inbox/new
    /inbox/star
    /inbox/archived
    /inbox/u/{username}


Values:
    action : int [1,7],
    newestLastMsg : int [0,]
    oldestLastMsg : int [0,]
    username : string [a-zA-Z0-9_-]
    newestMsg : int [0,]
    oldestMsg : int [0,]
    filter: int [0,3] - none (0); not readed (1); only stars (2); blockSender (3);
    firestLoad : false
    mark : int - star (0); block (1); spam (2); remove star (10); remove block (11)
    term : string [a-zA-Z0-9_-] (any special char as á, à, â, ä converted to a, ...)



Warnings:
    "A" - Has not available conversation with this username or not exist : { success: true, warning: "A", username: "foo-username", msgs: null, ...others as convs, action, don't change }
        => The conversation messages and listing should be removed, and show a message

    "B" - Need to wait the 48 hours from antepenultimate msg { success: true, warning: "B", ... }
        => Show a message

    "A" - Has not available conversation with this blockUsername or not exist : { success: true, warning: "C" }
        => 



Errors:
    1 - Json is not validated. Returns data : { success: false, error: 1 }

    2 - Many attempts. Returns data : { success: false, error: 2 }
        => redirect to url for suspicious actions


*/


