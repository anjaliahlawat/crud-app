
var MyComponent = React.createClass({
	render :function (){
	   return(
          Hello World
	   );
	}
});

ReactDOM.render(
   <MyComponent/>,document.getElementById('content')
);