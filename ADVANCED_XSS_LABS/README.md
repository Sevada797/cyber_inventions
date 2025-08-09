# XSS Labs

I created these labs as a mix of **real-life cases I’ve encountered** during my bug hunting journey  
and **original ideas** of mine that didn’t happen in the wild (yet 👀),  
but could totally exist in real-world applications.

The goal is to give learners a safe playground to:
- Understand different XSS vectors
- Practice bypassing filters and encodings
- Explore creative payload crafting

> 💡 These labs are **for educational and legal testing purposes only**.  
> Don’t try this on systems you don’t have permission to test.

Stay curious, stay safe — and happy exploiting! 😈

---

## How to Run

1. **Install PHP** (if you don’t have it yet):  
   - **Linux** (Debian/Ubuntu):  
     ```bash
     sudo apt update && sudo apt install php
     ```
   - **Mac** (Homebrew):  
     ```bash
     brew install php
     ```
   - **Windows**:  
     Download from [php.net](https://www.php.net/downloads) and add it to your PATH.

2. **Start a local PHP server** in the project directory:
   ```bash
   php -S 127.0.0.1:8000 -t ./
   ```
3. **In browser**
Go to http://127.0.0.1:8000

Happy hacking! 🔥
