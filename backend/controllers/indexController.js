const axios = require('axios');
const openai = require('openai');

// Example controller
exports.index = async (req, res) => {
    try {
        // Example OpenAI API usage
        const openaiClient = new openai.OpenAIApiClient({
            apiKey: process.env.OPENAI_API_KEY
        });
        const response = await openaiClient.chat.completion({
            model: 'text-davinci-002',
            messages: [
                { role: 'user', content: 'Hello, what can you do?' },
                { role: 'assistant', content: 'I can help you with information retrieval.' }
            ]
        });

        // Example MongoDB usage
        // Replace with actual model and data logic as per your application needs
        // const data = await YourModel.find();
        
        res.json({ message: 'Welcome to your Node.js MVC API!', openaiResponse: response.data.choices[0].text });
    } catch (err) {
        console.error('Error:', err);
        res.status(500).json({ error: 'Internal Server Error' });
    }
};
