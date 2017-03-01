//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Lesser General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Lesser General Public License for more details.
// 
// You should have received a copy of the GNU Lesser General Public License
// along with this program.  If not, see http://www.gnu.org/licenses/.
// 

package lab2;

module Node
{
    parameters:
        int nodeid;
    gates:
        input in;
        output out;
     submodules:
         A: Alayer{
             id=nodeid;
             counter=1;
         }
         D: Dlayer{
             id = nodeid;
         }
         P: Player{
             id=nodeid;
         }
         
      connections:
          A.out --> D.up_in;
          A.in <-- D.up_out;
          D.down_in <-- P.up_out;
          D.down_out --> P.up_in;
          P.down_in <-- in;
          P.down_out --> out;
          
          
          
          
         
}
