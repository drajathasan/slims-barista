// Create starter instance
const temp = `
    <div class="hidden lg:w-3/6 lg:block sia-login-banner">
        <div class="soa-brand flex flex-row px-5 py-3">
            <img class="w-12 h-12 mr-3" src="./assets/images/ump.png">
            <div>
                <h1 class="mt-5 mb-2 text-2xl text-white font-bold uppercase" style="line-height: 0">Sistem Informasi Akademik</h1>
                <small>v3.0.0</small>
            </div>
        </div>
        <div class="text-white">
            <strong class="w-7/12 ml-32 mt-64 block text-xl animate__animated animate__fadeIn animate__delay-1s">
            {{ quote }} 
            <br><small class="text-sm">{{ author }}</small></strong>
        </div>
    </div>
    <div class="w-full lg:w-3/6 h-screen bg-white p-10 lg:p-32">
        <div>
            <h2 class="mb-3 text-gray-700 text-3xl font-bold">Login</h2>
            <span class="mb-2 block text-gray-700 font-semibold">NIM</span>
            <input type="text" name="nim" class="w-full bg-gray-200 focus:bg-gray-100 p-3 focus:outline-none text-gray-700 text-base rounded-md" placeholder="Masukan NIM Anda"/>
            <span class="mt-2 mb-2 block text-gray-700 font-semibold">Password</span>
            <input type="password" name="pass" class="w-full bg-gray-200 focus:bg-gray-100 p-3 focus:outline-none text-gray-700 text-base rounded-md" placeholder="Masukan Password anda"/>
            <span class="mt-2 mb-1 block text-gray-700 font-semibold">Masuk Sebagai</span>
            <select name="type_login" class="w-full mt-3 p-3 rounded-md">
                <option value="MHS">Mahasiswa</option>
                <option value="ORTU">Orang Tua</option>
            </select>
            <button class="w-full bg-blue-600 mt-3 p-3 text-white rounded-md">Login</button>
            <span class="block mt-2 text-blue-500 text-white">Lupa Password?</span>
        </div>
    </div>
`

const Login = Vue.createApp({
    template: temp,
    data()
    {
        return {
            focusBorder: '',
            quote: '',
            author: ''
        }
    },
    methods: {
        async getOnlineQuote()
        {
            await fetch('https://api.quotable.io/random?maxLength=100&tags=technology|science|wisdom|education')
                .then(response => response.json())
                .then(result => {
                    this.quote = `"${result.content}"`
                    this.author = `- ${result.author}`
                })
                .catch(() => {
                    this.setLocalQuote()
                })
        },
        setLocalQuote()
        {
            this.quote = '“The cure for boredom is curiosity. There is no cure for curiosity”'
            this.author = '- Dorothy Parker'
        }
    },
    mounted()
    {
        this.getOnlineQuote()
    }
})

Login.mount('#LoginForm')