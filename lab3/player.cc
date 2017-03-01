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

#include "player.h"

Define_Module(Player);


void Player::initialize()
{
    // TODO - Generated method body
    down_in=gate("down_in");
    up_out=gate("up_out");
    up_in=gate("up_in");
    down_out=gate("down_out");
    id=par("id");
    sent =0;
    received =0;

}

void Player::handleMessage(cMessage *msg)
{
    received++;
    if(msg->getArrivalGate()==up_in){
        D_PDU* am = check_and_cast<D_PDU*>(msg);
        P_PDU* m = new P_PDU();
        m->setId(am->getId());
        m->setMsg(*am);
        if (uniform(0, 1) < 0.1) {
            bubble("losing msg");
            delete m;
        }
        else{
        send(m,down_out);
        sent++;
        }
    }
    else
    {
        P_PDU* am = check_and_cast<P_PDU*>(msg);
        D_PDU m = am->getMsg();
        D_PDU* pm = new D_PDU(m);
        if (uniform(0, 1) < 0.15) {
            bubble("losing msg");
            delete pm;
        }
        else{
        send(pm,up_out);
        sent++;
        }
    }


}

void Player::refreshDisplay() const
{
    char buf[40];
    sprintf(buf, "rcvd: %d sent: %d", received, sent);
    getDisplayString().setTagArg("t", 0, buf);
}
