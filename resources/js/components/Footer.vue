<template>
    <div>
        <footer class="footer">
            <ul>
                <li><a href="#" class="icon-facebook"></a><label>Google</label></li>
                <li><a href="#" class="icon-google"></a><label>Facebook</label></li>
                <li><a href="#" class="icon-twitter"></a><label>twitter</label></li>
            </ul>
        </footer>
    </div>
</template>

<style lang="scss" scoped>
    .footer {
        width: 100%;
        margin-top: auto;
        margin-bottom: 0;

        ul {
            width: 85%;
            background-color: rgba(#2339bf,0.75);
            display: flex;
            margin: 0 auto;
            padding: 0;

            li {
                list-style: none;
                margin: 0 auto;
                color: white;
                text-align: center;

                a {
                    font-size: 1em;
                    display: block;
                    text-decoration: none;
                }

                .icon-google {
                    color: #d95232;
                }

                .icon-facebook2 {
                    color: #3b5998;
                }

                .icon-twitter {
                    color: #00abf0;
                }

                label {
                    display: block;
                }
            }
        }
    }
</style>

