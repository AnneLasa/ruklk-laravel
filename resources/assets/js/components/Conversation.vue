<template>
    <div class="conversation">
        <!-- <MessagesFeed :messages="messages" :seller="this.seller"/> -->
        <MessageComposer @send="sendMessage"/>
    </div>

</template>

<script>
    import MessagesFeed from './MessagesFeed';
    import MessageComposer from './MessageComposer';


    export default {

        props:{
            messages:{

            },
            seller: Number
        },

        data(){
            return{

            }
        },

        mounted(){
            console.log(this.messages)
        },

        name: "Conversation",

        methods:{
            sendMessage(text){
                axios.post('/conversation/send', {
                    receiver_id: this.seller,
                    text: text,
                }).then((response)=>{
                    this.$emit('new', response.data);
                })

            }
        },
        components: {MessagesFeed, MessageComposer}
    }
</script>

<style scoped>

</style>
