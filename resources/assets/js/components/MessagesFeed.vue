<template>
    <div class="feed" ref="feed">
        <ul v-if="messages">
            <li v-for="message in messages" :class="`message${message.to == seller ?'sent':'received'}`" :key="message.id">
                <div class="text">
                    {{message.text}}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:{
            messages:{

                required: true
            },
            seller:Number

        },

        mounted(){
            console.log(this.seller);
        },

        methods:{
            scrollToBottom(){
                setTimeout(()=>{
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight  - this.$refs.feed.clientHeight;
                }, 50);

            }
        },

        watch :{
            messages(messages){
                this.scrollToBottom();
            }
        },


        name: "MessagesFeed"
    }
</script>

<style class="scss" scoped>
    .feed{
        height:100%;
        width:100%;
        max-height: 250px;
        overflow: scroll;
    }
    ul{
        list-style-type: none;
        padding: 5px;
    }
    li{
        margin: 10px 0;
        width: 100%;
    }
    .messagesent{
        text-align: right;
        background-color: lightgreen;

    }
    .messagereceived{

        text-align: left;
        background-color: lightblue;

    }
    text{
        max-width:200px;
        border-radius: 5px;
        padding:12px;
        display: inline-block;
    }

</style>
