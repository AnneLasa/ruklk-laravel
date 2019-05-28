<template>
    <div class="chat-app">
        <Conversation :messages = 'messages' :seller='this.seller' @new="saveNewMessage"></Conversation>
    </div>
</template>

<script>

    import Conversation from './Conversation';

    export default {
        props:{
          user:{
              type: Object,
              required: true
          },
          seller:Number
        },

        data(){
            return{
                messages:[],
            }

        },
        name: "ChatApp",
        mounted(){

            Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage', (e)=>{
                    this.handleIncoming(e.message);
                });
            this.startconversation(this.seller);
            this.loadMessages(this.seller);

        },

        methods:{
            sendMessage(text){
                console.log(text)
            },

            loadMessages: function (seller) {

                axios.get(`/conversation/${seller}`)
                    .then((response) => {

                        this.message = response.data;
                        this.seller = seller;

                     });
            },

            startconversation(seller){
                axios.get(`/conversation/${seller}`)
                    .then((response)=>{
                        this.messages = response.data;
                        console.log(this.messages);
                    })
            },

            saveNewMessage(text){
                this.messages.push(text);
            },

            handleIncoming(message){
                if(message.from == this.seller){
                    this.saveNewMessage(message);
                }
                alert(message.text);
            },

            



        },

        components: {Conversation}
    }
</script>

<style scoped>

</style>
