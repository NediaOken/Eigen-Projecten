// let randomNR = Math.floor(Math.random() * 10) + 1
let vakjes = 
{
	'1A':0,'1B':0,'1C':0,'2A':0,'2B':0,'2C':0,'3A':0,'3B':0,'3C':0,
	'1D':0,'1E':0,'1F':0,'2D':0,'2E':0,'2F':0,'3D':0,'3E':0,'3F':0,
	'1G':0,'1H':0,'1I':0,'2G':0,'2H':0,'2I':0,'3G':0,'3H':0,'3I':0,
	'4A':0,'4B':0,'4C':0,'5A':0,'5B':0,'5C':0,'6A':0,'6B':0,'6C':0,
	'4D':0,'4E':0,'4F':0,'5D':0,'5E':0,'5F':0,'6D':0,'6E':0,'6F':0,
	'4G':0,'4H':0,'4I':0,'5G':0,'5H':0,'5I':0,'6G':0,'6H':0,'6I':0,
	'7A':0,'7B':0,'7C':0,'8A':0,'8B':0,'8C':0,'9A':0,'9B':0,'9C':0,
	'7D':0,'7E':0,'7F':0,'8D':0,'8E':0,'8F':0,'9D':0,'9E':0,'9F':0,
	'7G':0,'7H':0,'7I':0,'8G':0,'8H':0,'8I':0,'9G':0,'9H':0,'9I':0
};


// console.log('resultaat vakje: ',controle_midden('1E'))


// console.log(vakjes['1A'])

for(let i = 1; i <= 10; i++)
{
	vakjes[getRandomVak()] = "b"
}

function getRandomVak()
{
	return Object.keys(vakjes)[Math.floor(Math.random()*Object.keys(vakjes).length)]
}

for(vakje in vakjes)
{
	let test = controle_midden(vakje)
	let vakjeElement = document.getElementById(vakje)
	vakjes[vakje] = test

	vakjeElement.innerHTML = test

	colors(test, vakjeElement)
}

function controle_midden(vakje)
{
	let positie = Object.keys(vakjes).indexOf(vakje)
	let punten = 0;

	if( Object.values(vakjes)[(positie)] == "b")
	{
		return "b"
	}
	else
	{
		if( Object.values(vakjes)[(positie - 1)] == "b")
		{
			punten++
		}

		if( Object.values(vakjes)[(positie - 8)] == "b")
		{
			punten++
		}

		if( Object.values(vakjes)[(positie - 9)] == "b")
		{
			punten++
		}

		if( Object.values(vakjes)[(positie - 10)] == "b")
		{
			punten++
		}

		if( Object.values(vakjes)[(positie + 1)] == "b")
		{
			punten++
		}

		if( Object.values(vakjes)[(positie + 8)] == "b")
		{
			punten++
		}

		if( Object.values(vakjes)[(positie + 9)] == "b")
		{
			punten++
		}

		if( Object.values(vakjes)[(positie + 10)] == "b")
		{
			punten++
		}
	}

	return punten
}

function colors(nummer, vakjeElement)
{
	if(nummer == 0)
	{
		vakjeElement.innerHTML = ""
		vakjeElement.style.height = '50px'
	}
	if(nummer == 1)
	{
		vakjeElement.style.color = "red"
		vakjeElement.style.fontWeight = "bold"
	}

	if(nummer == 2)
	{
		vakjeElement.style.color = "orange"
		vakjeElement.style.fontWeight = "bold"
	}

	if(nummer == 3)
	{
		vakjeElement.style.color = "yellow"
		vakjeElement.style.fontWeight = "bold"
	}

	if(nummer == 4)
	{
		vakjeElement.style.color = "green"
		vakjeElement.style.fontWeight = "bold"
	}

	if(nummer == 5)
	{
		vakjeElement.style.color = "blue"
		vakjeElement.style.fontWeight = "bold"
	}

	if(nummer == 6)
	{
		vakjeElement.style.color = "blue"
		vakjeElement.style.fontWeight = "bold"
	}

	if(nummer == 7)
	{
		vakjeElement.style.color = "purple"
		vakjeElement.style.fontWeight = "bold"
	}

	if(nummer == 8)
	{
		vakjeElement.style.color = "indigo"
		vakjeElement.style.fontWeight = "bold"
	}
}